<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>
<body>
    <h2>New Contact Form Message</h2>
    <p><strong>From (User):</strong> {{ $payload['name'] }} &lt;{{ $payload['email'] }}&gt;</p>
    <p><strong>Reply-To:</strong> {{ $payload['email'] }}</p>

    <p><strong>Name:</strong> {{ $payload['name'] }}</p>
    <p><strong>Email:</strong> {{ $payload['email'] }}</p>
    <p><strong>Subject:</strong> {{ $payload['subject'] }}</p>

    <hr>

    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($payload['message'])) !!}</p>
</body>
</html>
