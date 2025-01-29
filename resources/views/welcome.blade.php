<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('uploads/' . $setting->favicon) }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome - Typing Test | I2U Computer</title>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
</head>

<body>
    <div class="container">
        <h1>Welcome to Typing Test</h1>
        <p>
            Enhance your typing speed and accuracy with our interactive test.
            Challenge yourself and track your progress over time.
        </p>
        <a href="{{ route('user.dashboard') }}" class="btn">Start Typing Test</a>
        <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Typing Illustration" class="illustration">
    </div>
</body>

</html>
