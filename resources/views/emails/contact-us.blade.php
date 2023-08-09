<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact us </title>
</head>
<body>

<p><strong>Name:</strong> {{ $contactInfo['name'] }}</p>
<p><strong>Email:</strong> {{ $contactInfo['email'] }}</p>
<p><strong>Phone:</strong> {{ $contactInfo['phone'] }}</p>
<p><strong>Subject:</strong> {{ $contactInfo['subject'] }}</p>
<p><strong>Message:</strong> {!! $contactInfo['message'] !!}</p>

</body>
</html>