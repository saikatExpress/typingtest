<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Typing Test | i2u Computer</title>
    <link rel="shortcut icon" href="{{ asset('uploads/' . $setting->favicon) }}" type="image/x-icon">

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>

<body>
    <header>
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('uploads/' . $setting->project_logo) }}" alt="I2U Computer">
            <span><strong>{{ $setting->project_name }}</strong></span>
        </a>
        <nav class="menu">
            <a href="{{ route('welcome') }}">Home</a>
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
            <img style="border-radius: 50%; width:300px;height:300px;"
                src="{{ asset('uploads/' . $setting->project_logo) }}" alt="Typing Illustration">
        @else
            <img src="/assets/img/typing.png" alt="Typing Illustration">
        @endif
    </main>

    <!-- Institute Leadership Section -->
    <section class="leadership" style="text-align: center; margin-top: 50px;">
        <h2>Meet Our Leaders</h2>
        <div style="display: flex; justify-content: center; gap: 50px;">
            <!-- President -->
            <div>
                <img style="border-radius: 50%; width:200px; height:200px;"
                    src="{{ asset('uploads/' . $setting->president_image) }}" alt="Institute President">
                <h3>{{ $setting->president_name }}</h3>
                <p>Institute President</p>
            </div>
            <!-- Trainer -->
            <div>
                <img style="border-radius: 50%; width:200px; height:200px;"
                    src="{{ asset('uploads/' . $setting->trainer_image) }}" alt="Institute Trainer">
                <h3>{{ $setting->trainer_name }}</h3>
                <p>Institute Trainer</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>
            © 2025 Typing Test. All Rights Reserved.
            <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
        </p>
    </footer>
</body>

</html>
