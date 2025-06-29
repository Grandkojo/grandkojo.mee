<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a fake Vite manifest for testing
        Storage::fake('public');
        Storage::disk('public')->put('build/manifest.json', json_encode([
            'resources/css/app.css' => [
                'file' => 'assets/app-123.css',
                'src' => 'resources/css/app.css',
                'isEntry' => true
            ],
            'resources/js/app.js' => [
                'file' => 'assets/app-123.js',
                'src' => 'resources/js/app.js',
                'isEntry' => true
            ]
        ]));
    }
}
