<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - Typing Test | i2u Computer</title>
    <link rel="shortcut icon" href="{{ asset('uploads/' . $setting->favicon) }}" type="image/x-icon">

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

    <section class="leadership"
        style="text-align: center; margin-top: 50px; padding: 50px 20px; background-color: #f9f9f9;">
        <h2 style="font-size: 2.5rem; margin-bottom: 40px; color: #333;">Meet Our Leaders</h2>
        <div style="display: flex; justify-content: center; gap: 50px; flex-wrap: wrap;">
            <div class="leader-card"
                style="background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 300px; transition: transform 0.3s ease;">

                @if ($setting->president_image != null)
                    <img style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover; margin-bottom: 20px;"
                        src="{{ asset('uploads/' . $setting->president_image) }}" alt="Institute President">
                @else
                    <img style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover; margin-bottom: 20px;"
                        src="{{ asset('assets/img/president.jpg') }}" alt="Institute President">
                @endif

                <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: #222;">{{ $setting->president_name }}</h3>
                <p style="font-size: 1rem; color: teal;">President</p>
                <div class="social-links" style="margin-top: 15px;">
                    <a href="#" style="color: #555; margin: 0 10px; font-size: 1.2rem;"><i
                            class="fa-brands fa-linkedin"></i></a>
                    <a href="#" style="color: #555; margin: 0 10px; font-size: 1.2rem;"><i
                            class="fa-brands fa-twitter"></i></a>
                    <a href="#" style="color: #555; margin: 0 10px; font-size: 1.2rem;"><i
                            class="fa-brands fa-facebook"></i></a>
                </div>
            </div>

            <div class="leader-card"
                style="background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 300px; transition: transform 0.3s ease;">

                @if ($setting->trainer_image != null)
                    <img style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover; margin-bottom: 20px;"
                        src="{{ asset('uploads/' . $setting->trainer_image) }}" alt="Institute Trainer">
                @else
                    <img style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover; margin-bottom: 20px;"
                        src="{{ asset('assets/img/trainer.jpg') }}" alt="Institute Trainer">
                @endif

                <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: #222;">{{ $setting->trainer_name }}</h3>
                <p style="font-size: 1rem; color: teal;">Trainer</p>
                <div class="social-links" style="margin-top: 15px;">
                    <a href="#" style="color: #555; margin: 0 10px; font-size: 1.2rem;"><i
                            class="fa-brands fa-linkedin"></i></a>
                    <a href="#" style="color: #555; margin: 0 10px; font-size: 1.2rem;"><i
                            class="fa-brands fa-twitter"></i></a>
                    <a href="#" style="color: #555; margin: 0 10px; font-size: 1.2rem;"><i
                            class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>
            © 2025 Typing Test. All Rights Reserved.
            <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
        </p>
    </footer>
</body>

</html>
