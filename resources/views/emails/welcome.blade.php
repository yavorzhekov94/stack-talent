<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to StackTalents</title>
</head>
<body style="background-color: #f8fafc; font-family: Arial, sans-serif; padding: 20px;">
<table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 6px; padding: 30px;">
    <tr>
        <td align="center" style="font-size: 24px; font-weight: bold; color: #1e293b;">
            Welcome to StackTalents 🎉
        </td>
    </tr>
    <tr>
        <td style="padding-top: 20px; font-size: 16px; color: #111827;">
            Hi {{ $user->first_name ?? $user->name ?? 'there' }},
        </td>
    </tr>
    <tr>
        <td style="padding-top: 15px; font-size: 16px; color: #374151;">
            We're excited to have you on board.<br>
            Thank you for registering at <strong>StackTalents</strong>!
        </td>
    </tr>
    <tr>
        <td style="padding-top: 15px; font-size: 16px; color: #374151;">
            You can now log in and start exploring everything we have to offer.
        </td>
    </tr>
    <tr>
        <td style="padding-top: 25px;" align="center">
            <a href="{{ url('/login') }}" style="display: inline-block; background-color: #0d6efd; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 4px; font-weight: bold;">
                Login to Your Account
            </a>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 30px; font-size: 14px; color: #6b7280;">
            If you have any questions, feel free to contact us anytime.
        </td>
    </tr>
    <tr>
        <td style="padding-top: 20px; font-size: 14px; color: #374151;">
            Thanks again,<br>
            The StackTalents Team
        </td>
    </tr>
</table>
<p style="text-align: center; font-size: 12px; color: #9ca3af; margin-top: 20px;">
    © {{ date('Y') }} StackTalents. All rights reserved.
</p>
</body>
</html>
