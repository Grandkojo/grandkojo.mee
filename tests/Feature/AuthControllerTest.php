<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_logs_in_user_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    #[Test]
    public function it_logs_in_user_with_remember_me(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
            'remember' => 'on',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
        $this->assertNotNull($user->fresh()->remember_token);
    }

    #[Test]
    public function it_fails_login_with_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    #[Test]
    public function it_fails_login_with_nonexistent_user(): void
    {
        $response = $this->post('/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    #[Test]
    public function it_validates_required_fields(): void
    {
        $response = $this->post('/login', []);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email', 'password']);
    }

    #[Test]
    public function it_validates_email_format(): void
    {
        $response = $this->post('/login', [
            'email' => 'invalid-email',
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
    }

    #[Test]
    public function it_logs_out_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect(route('portfolio'));
        $this->assertGuest();
    }

    #[Test]
    public function it_regenerates_session_on_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $oldToken = session()->token();

        $response = $this->post('/logout');

        $this->assertNotEquals($oldToken, session()->token());
    }

    #[Test]
    public function it_redirects_to_intended_url_after_login(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Visit a protected page first
        $this->get('/admin/projects');

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin/projects');
    }
} 