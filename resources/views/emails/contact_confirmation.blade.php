<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thank You - Mitcoral</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9fafb; margin: 0; padding: 20px;">
    <div
        style="max-width: 600px; margin: auto; background: white; border-radius: 10px; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <div style="text-align: center;">
            <img src="{{ asset('images/mask_group.png') }}" alt="Mitcoral Logo"
                style="max-width: 150px; margin-bottom: 20px;">
            <h2 style="color: #1f2937;">Thank You for Contacting Mitcoral!</h2>
        </div>
        <p>Hi <strong>{{ $contact->name }}</strong>,</p>
        <p>Thank you for reaching out to us. We’ve received your message and our team will get back to you as soon as
            possible.</p>
        <hr style="margin: 20px 0;">
        <p><strong>Your Message:</strong></p>
        <blockquote style="background-color: #f3f4f6; padding: 15px; border-left: 4px solid #4f46e5;">
            {{ $contact->message ?? 'No message provided.' }}
        </blockquote>
        <p>If you have further questions, feel free to reply to this email.</p>
        <p style="margin-top: 20px;">Regards,<br><strong>Mitcoral Team</strong></p>
        <hr style="margin: 30px 0;">
        <p style="font-size: 13px; color: #6b7280;">Mitcoral | This is an automated confirmation email.</p>
    </div>
</body>

</html>