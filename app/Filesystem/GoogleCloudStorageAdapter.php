<?php

namespace App\Filesystem;

use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\Config;
use League\Flysystem\DirectoryAttributes;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemException;
use League\Flysystem\UnableToCreateDirectory;
use League\Flysystem\UnableToDeleteDirectory;
use League\Flysystem\UnableToDeleteFile;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToWriteFile;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class GoogleCloudStorageAdapter implements FilesystemAdapter, PublicUrlGenerator
{
    protected $storageClient;
    protected $bucket;
    protected $bucketName;

    public function __construct($config)
    {
        $this->bucketName = $config['bucket'];
        
        // Handle both file paths and JSON strings
        $keyFile = $config['key_file'] ?? null;
        $credentials = $config['credentials'] ?? null;
        
        $clientConfig = [
            'projectId' => $config['project_id'],
        ];
        
        if ($keyFile) {
            // Resolve relative path to absolute path
            if (!file_exists($keyFile) && !str_starts_with($keyFile, '/')) {
                $keyFile = base_path($keyFile);
            }
            $clientConfig['keyFilePath'] = $keyFile;
        } elseif ($credentials) {
            // Check if credentials is a JSON string (starts with {)
            if (str_starts_with(trim($credentials), '{')) {
                // Handle JSON string from environment
                $clientConfig['keyFile'] = json_decode($credentials, true);
            } elseif (str_starts_with(trim($credentials), 'eyJ')) {
                // Handle base64 encoded JSON
                $decoded = base64_decode($credentials);
                if ($decoded && str_starts_with(trim($decoded), '{')) {
                    $clientConfig['keyFile'] = json_decode($decoded, true);
                } else {
                    throw new \InvalidArgumentException('Invalid base64 encoded JSON credentials');
                }
            } else {
                // Treat as file path
                if (!file_exists($credentials) && !str_starts_with($credentials, '/')) {
                    $credentials = base_path($credentials);
                }
                $clientConfig['keyFilePath'] = $credentials;
            }
        }
        
        $this->storageClient = new StorageClient($clientConfig);
        
        $this->bucket = $this->storageClient->bucket($this->bucketName);
    }

    public function write(string $path, string $contents, Config $config): void
    {
        try {
            $object = $this->bucket->upload($contents, [
                'name' => $path,
            ]);
        } catch (\Exception $e) {
            throw UnableToWriteFile::atLocation($path, $e->getMessage());
        }
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
        try {
            $object = $this->bucket->upload($contents, [
                'name' => $path,
            ]);
        } catch (\Exception $e) {
            throw UnableToWriteFile::atLocation($path, $e->getMessage());
        }
    }

    public function delete(string $path): void
    {
        try {
            $object = $this->bucket->object($path);
            $object->delete();
        } catch (\Exception $e) {
            throw UnableToDeleteFile::atLocation($path, $e->getMessage());
        }
    }

    public function deleteDirectory(string $path): void
    {
        try {
            $objects = $this->bucket->objects(['prefix' => $path . '/']);
            foreach ($objects as $object) {
                $object->delete();
            }
        } catch (\Exception $e) {
            throw UnableToDeleteDirectory::atLocation($path, $e->getMessage());
        }
    }

    public function createDirectory(string $path, Config $config): void
    {
        try {
            // GCS doesn't have directories, but we can create a placeholder object
            $this->bucket->upload('', ['name' => $path . '/.keep']);
        } catch (\Exception $e) {
            throw UnableToCreateDirectory::atLocation($path, $e->getMessage());
        }
    }

    public function setVisibility(string $path, string $visibility): void
    {
        try {
            $object = $this->bucket->object($path);
            $object->update(['acl' => $visibility === 'public' ? 'publicRead' : 'private']);
        } catch (\Exception $e) {
            // Silently fail for visibility changes
        }
    }

    public function fileExists(string $path): bool
    {
        try {
            $object = $this->bucket->object($path);
            return $object->exists();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function directoryExists(string $path): bool
    {
        // GCS doesn't have directories, but we can check if any objects exist with this prefix
        $objects = $this->bucket->objects(['prefix' => $path . '/']);
        return iterator_count($objects) > 0;
    }

    public function read(string $path): string
    {
        try {
            $object = $this->bucket->object($path);
            return $object->downloadAsString();
        } catch (\Exception $e) {
            throw UnableToReadFile::fromLocation($path, $e->getMessage());
        }
    }

    public function readStream(string $path)
    {
        try {
            $object = $this->bucket->object($path);
            return $object->downloadAsStream();
        } catch (\Exception $e) {
            throw UnableToReadFile::fromLocation($path, $e->getMessage());
        }
    }

    public function listContents(string $path, bool $deep): iterable
    {
        $options = ['prefix' => $path];
        if (!$deep) {
            $options['delimiter'] = '/';
        }

        $objects = $this->bucket->objects($options);

        foreach ($objects as $object) {
            $name = $object->name();
            
            if ($name === $path) {
                continue; // Skip the directory itself
            }

            if (str_ends_with($name, '/')) {
                yield new DirectoryAttributes($name);
            } else {
                yield new FileAttributes($name, $object->size(), null, $object->updated());
            }
        }
    }

    public function move(string $source, string $destination, Config $config): void
    {
        try {
            $sourceObject = $this->bucket->object($source);
            $sourceObject->copy($this->bucket, ['name' => $destination]);
            $sourceObject->delete();
        } catch (\Exception $e) {
            throw UnableToWriteFile::atLocation($destination, $e->getMessage());
        }
    }

    public function copy(string $source, string $destination, Config $config): void
    {
        try {
            $sourceObject = $this->bucket->object($source);
            $sourceObject->copy($this->bucket, ['name' => $destination]);
        } catch (\Exception $e) {
            throw UnableToWriteFile::atLocation($destination, $e->getMessage());
        }
    }

    public function url(string $path): string
    {
        return "https://storage.googleapis.com/{$this->bucketName}/{$path}";
    }

    public function visibility(string $path): FileAttributes
    {
        try {
            $object = $this->bucket->object($path);
            $acl = $object->acl();
            $visibility = $acl->get(['entity' => 'allUsers']) ? 'public' : 'private';
            return new FileAttributes($path, null, $visibility);
        } catch (\Exception $e) {
            return new FileAttributes($path, null, 'private');
        }
    }

    public function mimeType(string $path): FileAttributes
    {
        try {
            $object = $this->bucket->object($path);
            $info = $object->info();
            $mimeType = $info['contentType'] ?? 'application/octet-stream';
            return new FileAttributes($path, null, null, null, $mimeType);
        } catch (\Exception $e) {
            return new FileAttributes($path, null, null, null, 'application/octet-stream');
        }
    }

    public function lastModified(string $path): FileAttributes
    {
        try {
            $object = $this->bucket->object($path);
            $info = $object->info();
            $timestamp = strtotime($info['updated']);
            return new FileAttributes($path, null, null, $timestamp);
        } catch (\Exception $e) {
            return new FileAttributes($path, null, null, time());
        }
    }

    public function fileSize(string $path): FileAttributes
    {
        try {
            $object = $this->bucket->object($path);
            $info = $object->info();
            $size = $info['size'] ?? 0;
            return new FileAttributes($path, $size);
        } catch (\Exception $e) {
            return new FileAttributes($path, 0);
        }
    }

    public function exists(string $path): bool
    {
        return $this->fileExists($path);
    }

    public function publicUrl(string $path, Config $config): string
    {
        return "https://storage.googleapis.com/{$this->bucketName}/{$path}";
    }
} 