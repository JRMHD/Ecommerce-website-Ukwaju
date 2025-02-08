<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        :root {
            --primary-light: #ECFF9F;
            --primary-purple: #EDC6FF;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #374151;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #ECFF9F 0%, #EDC6FF 100%);
            padding: 32px 40px;
            text-align: center;
        }

        .logo {
            max-height: 60px;
            margin-bottom: 20px;
        }

        .content {
            padding: 40px;
        }

        h2 {
            color: #1f2937;
            margin: 0 0 24px;
            font-size: 24px;
            font-weight: 600;
        }

        .field {
            margin-bottom: 24px;
            background: #f8fafc;
            padding: 16px;
            border-radius: 8px;
        }

        .field-label {
            font-weight: 600;
            color: #4b5563;
            margin-bottom: 4px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .field-value {
            color: #1f2937;
            margin: 0;
        }

        .message-box {
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            margin-top: 32px;
        }

        .footer {
            text-align: center;
            padding: 24px 40px;
            background: #f8fafc;
            color: #6b7280;
            font-size: 14px;
        }

        .thank-you {
            text-align: center;
            margin-top: 32px;
            color: #059669;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="{{ config('app.name') }}" class="logo">
            <h2>New Contact Form Submission</h2>
        </div>

        <div class="content">
            <div class="field">
                <div class="field-label">Name</div>
                <p class="field-value">{{ $contact->name }}</p>
            </div>

            <div class="field">
                <div class="field-label">Email</div>
                <p class="field-value">{{ $contact->email }}</p>
            </div>

            <div class="field">
                <div class="field-label">Phone</div>
                <p class="field-value">{{ $contact->phone }}</p>
            </div>

            <div class="field">
                <div class="field-label">Subject</div>
                <p class="field-value">{{ $contact->subject }}</p>
            </div>

            <div class="field">
                <div class="field-label">Service</div>
                <p class="field-value">{{ $contact->service }}</p>
            </div>

            <div class="message-box">
                <div class="field-label">Message</div>
                <p class="field-value">{{ $contact->message }}</p>
            </div>

            <p class="thank-you">Thank you for your submission!</p>
        </div>

        <div class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
