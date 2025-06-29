<?php

namespace Tests\Feature;

use App\Mail\ContactForm;
use App\Mail\ContactConfirmation;
use App\Models\Project;
use App\Models\ResumeItem;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PortfolioControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_displays_portfolio_page_with_data(): void
    {
        // Create test data
        $skill = Skill::factory()->create(['order' => 1]);
        $project = Project::factory()->create(['order' => 1]);
        $resumeItem = ResumeItem::factory()->create(['order' => 1]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('portfolio');
        $response->assertViewHas('skills');
        $response->assertViewHas('projects');
        $response->assertViewHas('resumeItems');
    }

    #[Test]
    public function it_orders_data_correctly(): void
    {
        // Create data in random order
        Skill::factory()->create(['name' => 'Second', 'order' => 2]);
        Skill::factory()->create(['name' => 'First', 'order' => 1]);
        Skill::factory()->create(['name' => 'Third', 'order' => 3]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $skills = $response->viewData('skills');
        
        $this->assertEquals('First', $skills[0]->name);
        $this->assertEquals('Second', $skills[1]->name);
        $this->assertEquals('Third', $skills[2]->name);
    }

    #[Test]
    public function it_sends_email_successfully(): void
    {
        Mail::fake();

        $emailData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ];

        $response = $this->post('/send-email', $emailData);

        $response->assertStatus(302);
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Email sent successfully');

        Mail::assertSent(ContactForm::class, function ($mail) use ($emailData) {
            return $mail->hasTo(env('MAIL_TO_ADDRESS'));
        });

        Mail::assertSent(ContactConfirmation::class, function ($mail) use ($emailData) {
            return $mail->hasTo($emailData['email']);
        });
    }

    #[Test]
    public function it_sends_email_via_ajax(): void
    {
        Mail::fake();

        $emailData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ];

        $response = $this->postJson('/send-email', $emailData);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Email sent successfully',
        ]);

        Mail::assertSent(ContactForm::class);
        Mail::assertSent(ContactConfirmation::class);
    }

    #[Test]
    public function it_validates_required_fields(): void
    {
        $response = $this->post('/send-email', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    #[Test]
    public function it_validates_email_format(): void
    {
        $response = $this->post('/send-email', [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'message' => 'Test message',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }

    #[Test]
    public function it_returns_validation_errors_via_ajax(): void
    {
        $response = $this->postJson('/send-email', []);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'Please check your input and try again.',
        ]);
        $response->assertJsonStructure(['errors']);
    }

    #[Test]
    public function it_handles_mail_exception(): void
    {
        Mail::fake();
        Mail::shouldReceive('to')->andThrow(new \Exception('Mail error'));

        $emailData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ];

        $response = $this->post('/send-email', $emailData);

        $response->assertStatus(302);
        $response->assertSessionHas('error', 'Failed to send email. Please try again.');
    }

    #[Test]
    public function it_handles_mail_exception_via_ajax(): void
    {
        Mail::fake();
        Mail::shouldReceive('to')->andThrow(new \Exception('Mail error'));

        $emailData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message',
        ];

        $response = $this->postJson('/send-email', $emailData);

        $response->assertStatus(500);
        $response->assertJson([
            'success' => false,
            'message' => 'Failed to send email. Please try again.',
        ]);
        $response->assertJsonStructure(['error']);
    }
} 