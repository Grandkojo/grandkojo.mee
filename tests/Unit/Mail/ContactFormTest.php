<?php

namespace Tests\Unit\Mail;

use App\Mail\ContactForm;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    #[Test]
    public function it_builds_mail_with_correct_data(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Test message content',
        ];

        $mail = new ContactForm($data);

        $this->assertEquals('New Contact Form Message from John Doe', $mail->envelope()->subject);
        $this->assertEquals('emails.contact-form', $mail->content()->view);
        $this->assertEquals($data, $mail->data);
    }

    #[Test]
    public function it_handles_empty_data(): void
    {
        $data = [];

        $mail = new ContactForm($data);

        $this->assertEquals('New Contact Form Message from ', $mail->envelope()->subject);
        $this->assertEquals('emails.contact-form', $mail->content()->view);
        $this->assertEquals($data, $mail->data);
    }

    #[Test]
    public function it_handles_partial_data(): void
    {
        $data = [
            'name' => 'John Doe',
            // Missing email and message
        ];

        $mail = new ContactForm($data);

        $this->assertEquals('New Contact Form Message from John Doe', $mail->envelope()->subject);
        $this->assertEquals('emails.contact-form', $mail->content()->view);
        $this->assertEquals($data, $mail->data);
    }

    #[Test]
    public function it_has_correct_data_structure(): void
    {
        $data = [
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'message' => 'Hello, this is a test message.',
        ];

        $mail = new ContactForm($data);

        $this->assertEquals($data, $mail->data);
        $this->assertArrayHasKey('name', $mail->data);
        $this->assertArrayHasKey('email', $mail->data);
        $this->assertArrayHasKey('message', $mail->data);
    }
} 