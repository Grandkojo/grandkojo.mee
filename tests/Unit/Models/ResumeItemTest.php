<?php

namespace Tests\Unit\Models;

use App\Models\ResumeItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ResumeItemTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_resume_item(): void
    {
        $resumeItem = ResumeItem::factory()->create([
            'type' => 'experience',
            'title' => 'Software Developer',
            'organization' => 'Tech Company',
            'location' => 'New York, NY',
            'start_date' => '2020-01-01',
            'end_date' => '2023-01-01',
            'description' => 'Developed web applications',
            'order' => 1,
        ]);

        $this->assertInstanceOf(ResumeItem::class, $resumeItem);
        $this->assertEquals('experience', $resumeItem->type);
        $this->assertEquals('Software Developer', $resumeItem->title);
        $this->assertEquals('Tech Company', $resumeItem->organization);
        $this->assertEquals('New York, NY', $resumeItem->location);
        $this->assertEquals('2020-01-01', $resumeItem->start_date->format('Y-m-d'));
        $this->assertEquals('2023-01-01', $resumeItem->end_date->format('Y-m-d'));
        $this->assertEquals('Developed web applications', $resumeItem->description);
        $this->assertEquals(1, $resumeItem->order);
    }

    #[Test]
    public function it_casts_start_date_to_date(): void
    {
        $resumeItem = ResumeItem::factory()->create([
            'start_date' => '2020-01-01',
        ]);

        $this->assertInstanceOf(\Carbon\Carbon::class, $resumeItem->start_date);
        $this->assertEquals('2020-01-01', $resumeItem->start_date->format('Y-m-d'));
    }

    #[Test]
    public function it_casts_end_date_to_date(): void
    {
        $resumeItem = ResumeItem::factory()->create([
            'end_date' => '2023-01-01',
        ]);

        $this->assertInstanceOf(\Carbon\Carbon::class, $resumeItem->end_date);
        $this->assertEquals('2023-01-01', $resumeItem->end_date->format('Y-m-d'));
    }

    #[Test]
    public function it_casts_order_to_integer(): void
    {
        $resumeItem = ResumeItem::factory()->create([
            'order' => '5',
        ]);

        $this->assertIsInt($resumeItem->order);
        $this->assertEquals(5, $resumeItem->order);
    }

    #[Test]
    public function it_orders_resume_items_by_order(): void
    {
        ResumeItem::factory()->create(['order' => 3, 'title' => 'Third']);
        ResumeItem::factory()->create(['order' => 1, 'title' => 'First']);
        ResumeItem::factory()->create(['order' => 2, 'title' => 'Second']);

        $resumeItems = ResumeItem::orderBy('order')->get();

        $this->assertEquals('First', $resumeItems[0]->title);
        $this->assertEquals('Second', $resumeItems[1]->title);
        $this->assertEquals('Third', $resumeItems[2]->title);
    }

    #[Test]
    public function it_handles_null_end_date(): void
    {
        $resumeItem = ResumeItem::factory()->create([
            'end_date' => null,
        ]);

        $this->assertNull($resumeItem->end_date);
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