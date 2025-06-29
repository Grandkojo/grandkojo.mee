<?php

namespace Tests\Unit\Models;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_project(): void
    {
        $project = Project::factory()->create([
            'title' => 'Test Project',
            'description' => 'Test Description',
            'technologies' => ['PHP', 'Laravel'],
            'project_url' => 'https://example.com',
            'github_url' => 'https://github.com/example',
            'order' => 1,
        ]);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals('Test Project', $project->title);
        $this->assertEquals('Test Description', $project->description);
        $this->assertEquals(['PHP', 'Laravel'], $project->technologies);
        $this->assertEquals('https://example.com', $project->project_url);
        $this->assertEquals('https://github.com/example', $project->github_url);
        $this->assertEquals(1, $project->order);
    }

    #[Test]
    public function it_casts_technologies_to_array(): void
    {
        $project = Project::factory()->create([
            'technologies' => ['PHP', 'Laravel', 'Vue.js'],
        ]);

        $this->assertIsArray($project->technologies);
        $this->assertEquals(['PHP', 'Laravel', 'Vue.js'], $project->technologies);
    }

    #[Test]
    public function it_casts_order_to_integer(): void
    {
        $project = Project::factory()->create([
            'order' => '5',
        ]);

        $this->assertIsInt($project->order);
        $this->assertEquals(5, $project->order);
    }

    #[Test]
    public function it_generates_image_url_when_featured_image_exists(): void
    {
        $project = Project::factory()->create([
            'featured_image' => 'projects/test-image.jpg',
        ]);

        $this->assertNotNull($project->image_url);
        $this->assertStringContainsString('storage/projects/test-image.jpg', $project->image_url);
    }

    #[Test]
    public function it_returns_null_image_url_when_no_featured_image(): void
    {
        $project = Project::factory()->create([
            'featured_image' => null,
        ]);

        $this->assertNull($project->image_url);
    }

    #[Test]
    public function it_orders_projects_by_order(): void
    {
        Project::factory()->create(['order' => 3]);
        Project::factory()->create(['order' => 1]);
        Project::factory()->create(['order' => 2]);

        $projects = Project::orderBy('order')->get();

        $this->assertEquals(1, $projects[0]->order);
        $this->assertEquals(2, $projects[1]->order);
        $this->assertEquals(3, $projects[2]->order);
    }
} 