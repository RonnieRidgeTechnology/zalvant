<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Appointment Confirmation - Mitcoral</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <tr>
                        <td align="center" style="background-color: #003366; padding: 20px;">
                            <img src="{{ asset('images/mask_group.png') }}" alt="Mitcoral Logo" width="150" style="display: block; margin-bottom: 10px;">
                            <h1 style="color: #ffffff; margin: 0;">Mitcoral</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="color: #333333;">Hi {{ $appointment->name }},</h2>
                            <p>Thank you for booking your appointment with <strong>Mitcoral</strong>.</p>

                            <h3>Appointment Details</h3>
                            <ul style="color: #555;">
                                <li><strong>Date:</strong> {{ $appointment->date }}</li>
                                <li><strong>Slot:</strong> {{ $appointment->slot }}</li>
                                <li><strong>Message:</strong> {{ $appointment->message ?? 'N/A' }}</li>
                            </ul>

                            <h3>Selected Services</h3>
                            <ul style="color: #555;">
                                @foreach($appointment->services as $service)
                                    <li>{{ $service->name }}</li>
                                @endforeach
                            </ul>

                            <p>We will contact you soon to confirm further details.</p>
                            <p>Warm regards,</p>
                            <p><strong>Mitcoral Team</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="background-color: #003366; color: #ffffff; padding: 15px;">
                            &copy; {{ date('Y') }} Mitcoral. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
