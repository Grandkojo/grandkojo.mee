<?php

namespace Tests\Feature\Admin;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SkillControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    #[Test]
    public function it_displays_skills_index(): void
    {
        Skill::factory()->count(3)->create();

        $response = $this->get('/admin/skills');

        $response->assertStatus(200);
        $response->assertViewIs('admin.skills.index');
        $response->assertViewHas('skills');
    }

    #[Test]
    public function it_displays_create_form(): void
    {
        $response = $this->get('/admin/skills/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.skills.form');
    }

    #[Test]
    public function it_stores_new_skill(): void
    {
        $skillData = [
            'name' => 'PHP',
            'category' => 'Backend',
            'proficiency' => 90,
            'order' => 1,
        ];

        $response = $this->post('/admin/skills', $skillData);

        $response->assertRedirect(route('admin.skills.index'));
        $response->assertSessionHas('success', 'Skill created successfully.');

        $this->assertDatabaseHas('skills', [
            'name' => 'PHP',
            'category' => 'Backend',
            'proficiency' => 90,
            'order' => 1,
        ]);
    }

    #[Test]
    public function it_validates_required_fields(): void
    {
        $response = $this->post('/admin/skills', []);

        $response->assertSessionHasErrors(['name', 'category', 'proficiency']);
    }

    #[Test]
    public function it_validates_proficiency_range(): void
    {
        $response = $this->post('/admin/skills', [
            'name' => 'PHP',
            'category' => 'Backend',
            'proficiency' => 150, // Invalid: should be 0-100
        ]);

        $response->assertSessionHasErrors(['proficiency']);
    }

    #[Test]
    public function it_validates_order_minimum(): void
    {
        $response = $this->post('/admin/skills', [
            'name' => 'PHP',
            'category' => 'Backend',
            'proficiency' => 90,
            'order' => -1, // Invalid: should be >= 0
        ]);

        $response->assertSessionHasErrors(['order']);
    }

    #[Test]
    public function it_displays_edit_form(): void
    {
        $skill = Skill::factory()->create();

        $response = $this->get("/admin/skills/{$skill->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('admin.skills.form');
        $response->assertViewHas('skill', $skill);
    }

    #[Test]
    public function it_updates_skill(): void
    {
        $skill = Skill::factory()->create([
            'name' => 'Old Name',
            'category' => 'Old Category',
            'proficiency' => 50,
        ]);

        $updateData = [
            'name' => 'Updated Name',
            'category' => 'Frontend',
            'proficiency' => 95,
            'order' => 5,
        ];

        $response = $this->put("/admin/skills/{$skill->id}", $updateData);

        $response->assertRedirect(route('admin.skills.index'));
        $response->assertSessionHas('success', 'Skill updated successfully.');

        $skill->refresh();
        $this->assertEquals('Updated Name', $skill->name);
        $this->assertEquals('Frontend', $skill->category);
        $this->assertEquals(95, $skill->proficiency);
        $this->assertEquals(5, $skill->order);
    }

    #[Test]
    public function it_deletes_skill(): void
    {
        $skill = Skill::factory()->create();

        $response = $this->delete("/admin/skills/{$skill->id}");

        $response->assertRedirect(route('admin.skills.index'));
        $response->assertSessionHas('success', 'Skill deleted successfully.');

        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }

    #[Test]
    public function it_orders_skills_correctly(): void
    {
        Skill::factory()->create(['name' => 'Third', 'order' => 3]);
        Skill::factory()->create(['name' => 'First', 'order' => 1]);
        Skill::factory()->create(['name' => 'Second', 'order' => 2]);

        $response = $this->get('/admin/skills');

        $response->assertStatus(200);
        $skills = $response->viewData('skills');

        $this->assertEquals('First', $skills[0]->name);
        $this->assertEquals('Second', $skills[1]->name);
        $this->assertEquals('Third', $skills[2]->name);
    }

    #[Test]
    public function it_supports_different_categories(): void
    {
        $backendSkill = Skill::factory()->create(['category' => 'Backend']);
        $frontendSkill = Skill::factory()->create(['category' => 'Frontend']);
        $databaseSkill = Skill::factory()->create(['category' => 'Database']);

        $this->assertEquals('Backend', $backendSkill->category);
        $this->assertEquals('Frontend', $frontendSkill->category);
        $this->assertEquals('Database', $databaseSkill->category);
    }
} 