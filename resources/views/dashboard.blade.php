<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Typing Test | I2U Computer</title>
    <link rel="shortcut icon" href="{{ asset('uploads/' . $setting->favicon) }}" type="image/x-icon">

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>

<body>
    <header>
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('uploads/'. $setting->project_logo) }}" alt="I2U Computer">
            <span><strong>{{ $setting->project_name }}</strong></span>
        </a>
        <nav class="menu">
            <a href="{{ route('typing.type', ['type' => 'regular']) }}">Regular</a>
            <a href="{{ route('typing.type', ['type' => 'exam']) }}">Exam</a>
            <a href="{{ $setting->fb_link }}"><i class="fa-brands fa-facebook"></i></a>
            <a href="{{ $setting->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
            <a href="{{ $setting->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h1>Start Your Typing Journey!</h1>
        <p>
            Test your typing speed and accuracy with our interactive typing tools. Whether you're looking to improve or
            challenge yourself, we have you covered.
        </p>
        @if ($setting->project_logo != null)
            <img style="border-radius: 50%; width:300px;height:300px;" src="{{ asset('uploads/' . $setting->project_logo) }}" alt="Typing Illustration">
        @else
            <img src="/assets/img/typing.png" alt="Typing Illustration">
        @endif

        <a href="{{ route('typing.type', ['type' => 'regular']) }}" class="btn-start">Start Typing Now</a>
    </main>

    <!-- Footer -->
    <footer>
        <p>
            © 2025 Typing Test. All Rights Reserved.
            <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
        </p>
    </footer>
</body>

</html>
