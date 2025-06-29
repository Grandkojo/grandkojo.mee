<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_user(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
    }

    #[Test]
    public function it_hides_password_and_remember_token(): void
    {
        $user = User::factory()->create();

        $userArray = $user->toArray();

        $this->assertArrayNotHasKey('password', $userArray);
        $this->assertArrayNotHasKey('remember_token', $userArray);
    }

    #[Test]
    public function it_casts_email_verified_at_to_datetime(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->assertInstanceOf(\Carbon\Carbon::class, $user->email_verified_at);
    }

    #[Test]
    public function it_hashes_password(): void
    {
        $user = User::factory()->create([
            'password' => 'plaintext_password',
        ]);

        $this->assertNotEquals('plaintext_password', $user->password);
        $this->assertTrue(password_verify('plaintext_password', $user->password));
    }
} 