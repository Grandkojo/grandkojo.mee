<?php

namespace Tests\Unit\Filesystem;

use App\Filesystem\GoogleCloudStorageAdapter;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GoogleCloudStorageAdapterTest extends TestCase
{
    #[Test]
    public function it_implements_required_interfaces(): void
    {
        // This test verifies that the class implements the required interfaces
        // without actually instantiating it (which requires a valid key file)
        $this->assertTrue(
            is_subclass_of(GoogleCloudStorageAdapter::class, \League\Flysystem\FilesystemAdapter::class)
        );
        
        $this->assertTrue(
            is_subclass_of(GoogleCloudStorageAdapter::class, \League\Flysystem\UrlGeneration\PublicUrlGenerator::class)
        );
    }

    #[Test]
    public function it_has_required_methods(): void
    {
        $reflection = new \ReflectionClass(GoogleCloudStorageAdapter::class);
        
        // Check for required FilesystemAdapter methods
        $this->assertTrue($reflection->hasMethod('write'));
        $this->assertTrue($reflection->hasMethod('writeStream'));
        $this->assertTrue($reflection->hasMethod('delete'));
        $this->assertTrue($reflection->hasMethod('fileExists'));
        $this->assertTrue($reflection->hasMethod('read'));
        $this->assertTrue($reflection->hasMethod('readStream'));
        $this->assertTrue($reflection->hasMethod('listContents'));
        $this->assertTrue($reflection->hasMethod('move'));
        $this->assertTrue($reflection->hasMethod('copy'));
        
        // Check for PublicUrlGenerator methods
        $this->assertTrue($reflection->hasMethod('publicUrl'));
    }

    #[Test]
    public function it_has_constructor_with_config_parameter(): void
    {
        $reflection = new \ReflectionClass(GoogleCloudStorageAdapter::class);
        $constructor = $reflection->getConstructor();
        
        $this->assertNotNull($constructor);
        $this->assertEquals(1, $constructor->getNumberOfParameters());
        
        $parameter = $constructor->getParameters()[0];
        $this->assertEquals('config', $parameter->getName());
    }
} 