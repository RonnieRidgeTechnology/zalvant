<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Appointment Received - Mitcoral</title>
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
                        <td style="padding: 30px; color: #333333;">
                            <h2>New Appointment Booked</h2>
                            <p><strong>Name:</strong> {{ $appointment->name }}</p>
                            <p><strong>Email:</strong> {{ $appointment->email }}</p>
                            <p><strong>Date:</strong> {{ $appointment->date }}</p>
                            <p><strong>Slot:</strong> {{ $appointment->slot }}</p>
                            <p><strong>Message:</strong> {{ $appointment->message ?? 'N/A' }}</p>

                            <h3>Selected Services:</h3>
                            <ul>
                                @foreach($appointment->services as $service)
                                    <li>{{ $service->name }}</li>
                                @endforeach
                            </ul>
                            <p style="margin-top: 30px;">Please review and follow up with the client as needed.</p>

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
