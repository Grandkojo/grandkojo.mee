<?php

namespace Tests\Feature\Admin;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    #[Test]
    public function it_displays_projects_index(): void
    {
        Project::factory()->count(3)->create();

        $response = $this->get('/admin/projects');

        $response->assertStatus(200);
        $response->assertViewIs('admin.projects.index');
        $response->assertViewHas('projects');
    }

    #[Test]
    public function it_displays_create_form(): void
    {
        $response = $this->get('/admin/projects/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.projects.create');
    }

    #[Test]
    public function it_stores_new_project(): void
    {
        $projectData = [
            'title' => 'Test Project',
            'description' => 'Test Description',
            'technologies' => 'PHP, Laravel, Vue.js',
            'project_url' => 'https://example.com',
            'github_url' => 'https://github.com/example',
            'order' => 1,
        ];

        $response = $this->post('/admin/projects', $projectData);

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success', 'Project created successfully.');

        $this->assertDatabaseHas('projects', [
            'title' => 'Test Project',
            'description' => 'Test Description',
            'project_url' => 'https://example.com',
            'github_url' => 'https://github.com/example',
            'order' => 1,
        ]);

        $project = Project::where('title', 'Test Project')->first();
        $this->assertEquals(['PHP', 'Laravel', 'Vue.js'], $project->technologies);
    }

    #[Test]
    public function it_validates_required_fields(): void
    {
        $response = $this->post('/admin/projects', []);

        $response->assertSessionHasErrors(['title', 'description', 'technologies']);
    }

    #[Test]
    public function it_validates_url_format(): void
    {
        $response = $this->post('/admin/projects', [
            'title' => 'Test Project',
            'description' => 'Test Description',
            'technologies' => 'PHP, Laravel',
            'project_url' => 'invalid-url',
            'github_url' => 'invalid-url',
        ]);

        $response->assertSessionHasErrors(['project_url', 'github_url']);
    }

    #[Test]
    public function it_validates_image_format(): void
    {
        $file = UploadedFile::fake()->create('document.pdf', 100);

        $response = $this->post('/admin/projects', [
            'title' => 'Test Project',
            'description' => 'Test Description',
            'technologies' => 'PHP, Laravel',
            'featured_image' => $file,
        ]);

        $response->assertSessionHasErrors(['featured_image']);
    }

    #[Test]
    public function it_displays_edit_form(): void
    {
        $project = Project::factory()->create();

        $response = $this->get("/admin/projects/{$project->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('admin.projects.form');
        $response->assertViewHas('project', $project);
    }

    #[Test]
    public function it_updates_project(): void
    {
        $project = Project::factory()->create([
            'title' => 'Old Title',
            'description' => 'Old Description',
        ]);

        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'technologies' => 'PHP, Laravel, React',
            'order' => 5,
        ];

        $response = $this->put("/admin/projects/{$project->id}", $updateData);

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success', 'Project updated successfully.');

        $project->refresh();
        $this->assertEquals('Updated Title', $project->title);
        $this->assertEquals('Updated Description', $project->description);
        $this->assertEquals(['PHP', 'Laravel', 'React'], $project->technologies);
        $this->assertEquals(5, $project->order);
    }

    #[Test]
    public function it_updates_project_with_new_image(): void
    {
        Storage::fake('public');

        $project = Project::factory()->create([
            'featured_image' => 'projects/old-image.jpg',
        ]);

        $file = UploadedFile::fake()->image('new-project.jpg');

        $updateData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'technologies' => 'PHP, Laravel',
            'featured_image' => $file,
        ];

        $response = $this->put("/admin/projects/{$project->id}", $updateData);

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success', 'Project updated successfully.');

        $project->refresh();
        $this->assertNotEquals('projects/old-image.jpg', $project->featured_image);
        Storage::disk('public')->assertExists($project->featured_image);
    }

    #[Test]
    public function it_deletes_project(): void
    {
        $project = Project::factory()->create();

        $response = $this->delete("/admin/projects/{$project->id}");

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success', 'Project deleted successfully.');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    #[Test]
    public function it_deletes_project_with_image(): void
    {
        Storage::fake('public');

        $project = Project::factory()->create([
            'featured_image' => 'projects/test-image.jpg',
        ]);

        Storage::disk('public')->put('projects/test-image.jpg', 'fake content');

        $response = $this->delete("/admin/projects/{$project->id}");

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success', 'Project deleted successfully.');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
        Storage::disk('public')->assertMissing('projects/test-image.jpg');
    }
} 