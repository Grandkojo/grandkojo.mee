<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank you for your message</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #1b1b18;
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px 20px;
            border-radius: 0 0 8px 8px;
        }
        .message {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #1b1b18;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
        .social-links {
            margin: 20px 0;
            text-align: center;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #1b1b18;
            text-decoration: none;
        }
        .social-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Thank you for your message!</h1>
        <p>Hi {{ $data['name'] }}, I've received your message and will get back to you soon.</p>
    </div>
    
    <div class="content">
        <div class="message">
            <h3>Your message:</h3>
            <p><em>"{{ $data['message'] }}"</em></p>
        </div>
        
        <p>Thank you for reaching out to me! I've received your message and will review it carefully. I typically respond within 24-48 hours during business days.</p>
        
        <p>In the meantime, feel free to:</p>
        <ul>
            <li>Check out my <a href="{{ config('app.url') }}#projects" style="color: #1b1b18;">portfolio projects</a></li>
            <li>Connect with me on social media</li>
            <li>Explore my <a href="{{ config('app.url') }}#resume" style="color: #1b1b18;">resume and experience</a></li>
        </ul>
        
        <div class="social-links">
            <a href="https://github.com/Grandkojo">GitHub</a> |
            <a href="https://www.linkedin.com/in/ernest-essien-kojo">LinkedIn</a> |
            <a href="https://x.com/grandkojo">Twitter</a>
        </div>
        
        <p>Best regards,<br>
        <strong>Ernest Kojo Owusu Essien</strong><br>
        Software Developer</p>
        
        <div class="footer">
            <p>This is an automated confirmation email from my portfolio website.</p>
            <p>Sent on {{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>
</html> 