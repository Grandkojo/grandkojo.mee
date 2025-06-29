<?php

namespace Tests\Unit\Models;

use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_skill(): void
    {
        $skill = Skill::factory()->create([
            'name' => 'PHP',
            'category' => 'Backend',
            'proficiency' => 90,
            'order' => 1,
        ]);

        $this->assertInstanceOf(Skill::class, $skill);
        $this->assertEquals('PHP', $skill->name);
        $this->assertEquals('Backend', $skill->category);
        $this->assertEquals(90, $skill->proficiency);
        $this->assertEquals(1, $skill->order);
    }

    #[Test]
    public function it_casts_proficiency_to_integer(): void
    {
        $skill = Skill::factory()->create([
            'proficiency' => '85',
        ]);

        $this->assertIsInt($skill->proficiency);
        $this->assertEquals(85, $skill->proficiency);
    }

    #[Test]
    public function it_casts_order_to_integer(): void
    {
        $skill = Skill::factory()->create([
            'order' => '3',
        ]);

        $this->assertIsInt($skill->order);
        $this->assertEquals(3, $skill->order);
    }

    #[Test]
    public function it_orders_skills_by_order(): void
    {
        Skill::factory()->create(['order' => 3, 'name' => 'Third']);
        Skill::factory()->create(['order' => 1, 'name' => 'First']);
        Skill::factory()->create(['order' => 2, 'name' => 'Second']);

        $skills = Skill::orderBy('order')->get();

        $this->assertEquals('First', $skills[0]->name);
        $this->assertEquals('Second', $skills[1]->name);
        $this->assertEquals('Third', $skills[2]->name);
    }

    #[Test]
    public function it_validates_proficiency_range(): void
    {
        $skill = Skill::factory()->create([
            'proficiency' => 100,
        ]);

        $this->assertEquals(100, $skill->proficiency);

        $skill = Skill::factory()->create([
            'proficiency' => 0,
        ]);

        $this->assertEquals(0, $skill->proficiency);
    }
} 