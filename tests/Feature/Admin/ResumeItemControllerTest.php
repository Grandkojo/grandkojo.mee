<?php

namespace Tests\Feature\Admin;

use App\Models\ResumeItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ResumeItemControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    #[Test]
    public function it_displays_resume_items_index(): void
    {
        ResumeItem::factory()->count(3)->create();

        $response = $this->get('/admin/resume');

        $response->assertStatus(200);
        $response->assertViewIs('admin.resume.index');
        $response->assertViewHas('resumeItems');
    }

    #[Test]
    public function it_displays_create_form(): void
    {
        $response = $this->get('/admin/resume/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.resume.form');
    }

    #[Test]
    public function it_stores_new_resume_item(): void
    {
        $resumeItemData = [
            'type' => 'experience',
            'title' => 'Software Developer',
            'organization' => 'Tech Company',
            'location' => 'New York, NY',
            'start_date' => '2020-01-01',
            'end_date' => '2023-01-01',
            'description' => 'Developed web applications',
            'order' => 1,
        ];

        $response = $this->post('/admin/resume', $resumeItemData);

        $response->assertRedirect(route('admin.resume.index'));
        $response->assertSessionHas('success', 'Resume item created successfully.');

        $this->assertDatabaseHas('resume_items', [
            'type' => 'experience',
            'title' => 'Software Developer',
            'organization' => 'Tech Company',
            'location' => 'New York, NY',
            'description' => 'Developed web applications',
            'order' => 1,
        ]);
    }

    #[Test]
    public function it_stores_resume_item_without_end_date(): void
    {
        $resumeItemData = [
            'type' => 'experience',
            'title' => 'Current Position',
            'organization' => 'Current Company',
            'location' => 'Remote',
            'start_date' => '2023-01-01',
            'end_date' => null,
            'description' => 'Current role',
            'order' => 1,
        ];

        $response = $this->post('/admin/resume', $resumeItemData);

        $response->assertRedirect(route('admin.resume.index'));
        $response->assertSessionHas('success', 'Resume item created successfully.');

        $this->assertDatabaseHas('resume_items', [
            'title' => 'Current Position',
            'end_date' => null,
        ]);
    }

    #[Test]
    public function it_validates_required_fields(): void
    {
        $response = $this->post('/admin/resume', []);

        $response->assertSessionHasErrors(['type', 'title', 'organization', 'start_date']);
    }

    #[Test]
    public function it_validates_date_format(): void
    {
        $response = $this->post('/admin/resume', [
            'type' => 'experience',
            'title' => 'Test Position',
            'organization' => 'Test Company',
            'start_date' => 'invalid-date',
            'end_date' => 'invalid-date',
        ]);

        $response->assertSessionHasErrors(['start_date', 'end_date']);
    }

    #[Test]
    public function it_validates_end_date_after_start_date(): void
    {
        $response = $this->post('/admin/resume', [
            'type' => 'experience',
            'title' => 'Test Position',
            'organization' => 'Test Company',
            'start_date' => '2023-01-01',
            'end_date' => '2020-01-01', // End date before start date
        ]);

        $response->assertSessionHasErrors(['end_date']);
    }

    #[Test]
    public function it_validates_order_minimum(): void
    {
        $response = $this->post('/admin/resume', [
            'type' => 'experience',
            'title' => 'Test Position',
            'organization' => 'Test Company',
            'start_date' => '2020-01-01',
            'order' => -1, // Invalid: should be >= 0
        ]);

        $response->assertSessionHasErrors(['order']);
    }

    #[Test]
    public function it_displays_edit_form(): void
    {
        $resumeItem = ResumeItem::factory()->create();

        $response = $this->get("/admin/resume/{$resumeItem->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('admin.resume.form');
        $response->assertViewHas('resumeItem', $resumeItem);
    }

    #[Test]
    public function it_updates_resume_item(): void
    {
        $resumeItem = ResumeItem::factory()->create([
            'title' => 'Old Title',
            'organization' => 'Old Organization',
        ]);

        $updateData = [
            'type' => 'education',
            'title' => 'Updated Title',
            'organization' => 'Updated Organization',
            'location' => 'Updated Location',
            'start_date' => '2021-01-01',
            'end_date' => '2024-01-01',
            'description' => 'Updated description',
            'order' => 5,
        ];

        $response = $this->put("/admin/resume/{$resumeItem->id}", $updateData);

        $response->assertRedirect(route('admin.resume.index'));
        $response->assertSessionHas('success', 'Resume item updated successfully.');

        $resumeItem->refresh();
        $this->assertEquals('education', $resumeItem->type);
        $this->assertEquals('Updated Title', $resumeItem->title);
        $this->assertEquals('Updated Organization', $resumeItem->organization);
        $this->assertEquals('Updated Location', $resumeItem->location);
        $this->assertEquals('2021-01-01', $resumeItem->start_date->format('Y-m-d'));
        $this->assertEquals('2024-01-01', $resumeItem->end_date->format('Y-m-d'));
        $this->assertEquals('Updated description', $resumeItem->description);
        $this->assertEquals(5, $resumeItem->order);
    }

    #[Test]
    public function it_deletes_resume_item(): void
    {
        $resumeItem = ResumeItem::factory()->create();

        $response = $this->delete("/admin/resume/{$resumeItem->id}");

        $response->assertRedirect(route('admin.resume.index'));
        $response->assertSessionHas('success', 'Resume item deleted successfully.');

        $this->assertDatabaseMissing('resume_items', ['id' => $resumeItem->id]);
    }

    #[Test]
    public function it_orders_resume_items_correctly(): void
    {
        ResumeItem::factory()->create(['title' => 'Third', 'order' => 3]);
        ResumeItem::factory()->create(['title' => 'First', 'order' => 1]);
        ResumeItem::factory()->create(['title' => 'Second', 'order' => 2]);

        $response = $this->get('/admin/resume');

        $response->assertStatus(200);
        $resumeItems = $response->viewData('resumeItems');

        $this->assertEquals('First', $resumeItems[0]->title);
        $this->assertEquals('Second', $resumeItems[1]->title);
        $this->assertEquals('Third', $resumeItems[2]->title);
    }

    #[Test]
    public function it_supports_different_types(): void
    {
        $experience = ResumeItem::factory()->create(['type' => 'experience']);
        $education = ResumeItem::factory()->create(['type' => 'education']);
        $certification = ResumeItem::factory()->create(['type' => 'certification']);

        $this->assertEquals('experience', $experience->type);
        $this->assertEquals('education', $education->type);
        $this->assertEquals('certification', $certification->type);
    }
} 