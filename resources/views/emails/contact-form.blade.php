<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Message</title>
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
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #1b1b18;
            margin-bottom: 5px;
        }
        .field-value {
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            border-left: 4px solid #1b1b18;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Message</h1>
        <p>You have received a new message from your portfolio website</p>
    </div>
    
    <div class="content">
        <p>Hello,</p>
        
        <p>You have received a new message through your portfolio contact form.</p>
        
        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $data['name'] }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">{{ $data['email'] }}</div>
        </div>
        
        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ $data['message'] }}</div>
        </div>
        
        <p>Please respond to this inquiry at your earliest convenience.</p>
        
        <p>Best regards,<br>
        Your Portfolio Website</p>
        
        <div class="footer">
            <p>This message was sent from your portfolio contact form at {{ config('app.url') }}</p>
            <p>Sent on {{ now()->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>
</html> 