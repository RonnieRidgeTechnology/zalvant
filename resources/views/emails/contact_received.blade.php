<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message - Mitcoral</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 10px; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <div style="text-align: center;">
            <img src="{{ asset('images/mask_group.png') }}" alt="Mitcoral Logo" style="max-width: 150px; margin-bottom: 20px;">
            <h2 style="color: #1f2937;">New Contact Message Received</h2>
        </div>
        <hr style="margin: 20px 0;">
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Phone:</strong> {{ $contact->phone }}</p>
        <p><strong>Company:</strong> {{ $contact->company ?? 'N/A' }}</p>
        <p><strong>Service:</strong> {{ $contact->service->name ?? 'N/A' }}</p>
        <p><strong>Message:</strong><br>{{ $contact->message ?? 'No message provided.' }}</p>
        <hr style="margin: 20px 0;">
        <p style="font-size: 13px; color: #6b7280;">Mitcoral | This is an automated message.</p>
    </div>
</body>
</html>
