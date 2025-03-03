<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Test</title>

    <link rel="shortcut icon" href="{{ asset('uploads/' . $setting->favicon) }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .navbar {
            background: linear-gradient(90deg, rgb(30, 58, 138), rgb(99, 102, 241));

        }

        .navbar-brand img {
            height: 75px;
            border-radius: 5px;
        }

        .navbar-nav {
            margin: auto;
        }

        .navbar-brand span {
            font-weight: 700;
            color: #ffed4a;
            font-size: 25px;
        }

        .nav-link {
            color: white !important;
            padding: 10px 15px;
            font-size: 20px;
        }

        .nav-link:hover {
            color: #5CA7CE !important;
            /* Softer blue for highlight */
        }

        .social-icons a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            text-decoration: none;
            border: 1px solid white;
            transition: transform 0.3s ease, filter 0.3s ease;
            background-color: white;
        }

        .fa-facebook-f {
            color: #1877F2;
        }

        .fa-twitter {
            color: #1DA1F2;
        }

        .fa-instagram {
            color: #E4405F;
        }

        .fa-youtube {
            color: #FF0000;
        }

        .social-icons a:nth-child(1):hover {
            background-color: #1877F2;
        }

        .social-icons a:nth-child(2):hover {
            background-color: #1DA1F2;
        }

        .social-icons a:nth-child(3):hover {
            background-color: #E4405F;
        }

        .social-icons a:nth-child(4):hover {
            background-color: #FF0000;
        }

        .social-icons a:hover i {
            color: white;
        }

        /*.fa-youtube {*/
        /*    color: red;*/
        /*}*/
        /*.fa-youtube:hover, .social-icons a:hover {*/
        /*    color: #5CA7CE;*/
        /*}*/
        /* Body CSS */
        .card-img-top {
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
            margin: 10px auto;
            display: block;
            border: 4px solid #455;
        }

        .bg-color-custom {
            background-color: #33C5FE;
        }

        .card {
            transition: box-shadow 0.3s ease-in-out;
            padding: 0px 10px;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        /* Footer Styles */
        .footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Mobile View Adjustments */
        @media only screen and (max-width: 767px) {
            .card-body {
                text-align: center;
            }

            .card {
                margin: auto;
            }

            .home {
                text-align: center;
            }
        }

        @media (max-width: 991px) {
            .navbar-nav {
                text-align: center;
            }

            .social-icons {
                margin-top: 10px;
                text-align: center;
            }
        }

        @media (max-width: 461px) {
            .navbar-brand span {
                display: none;
            }
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <!-- Left Logo -->
                <div class="flex items-center space-x-2">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('uploads/' . $setting->project_logo) }}" alt="Logo" class="h-10 w-10">
                        <span class="text-xl font-bold">i2u Computer Education</span>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Center Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('typing.type', ['type' => 'regular']) }}">
                                Regular
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('typing.type', ['type' => 'exam']) }}">
                                Exam
                            </a>
                        </li>
                    </ul>

                    <!-- Right Social Icons (Now inside collapsible menu) -->
                    <div class="social-icons text-center mt-3 d-lg-none">
                        <a href="{{ $setting->fb_link }}"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="{{ $setting->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{ $setting->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Right Social Icons (Visible only on large screens) -->
                <div class="social-icons d-none d-lg-block">
                    <a href="{{ $setting->fb_link }}"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="{{ $setting->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{ $setting->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-color-custom">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 home">
                    <h2>Meet Our Leaders</h2>
                    <div class="py-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('uploads/' . $setting->president_image) }}" class="card-img-top"
                                alt="President">
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $setting->president_name }}
                                </h5>
                                <p class="card-text">
                                    {{ $setting->president_designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('uploads/' . $setting->trainer_image) }}" class="card-img-top"
                                alt="Profile Image">
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $setting->trainer_name }}
                                </h5>
                                <p class="card-text">
                                    {{ $setting->trainer_designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 home">
                    <h2 class="text-center"><span style="color: #ffed4a; font-weight: 700;">i2u</span> Start Your Typing
                        Journey!</h2>
                    <!-- Bootstrap Slider -->
                    <div id="heroCarousel" class="carousel slide pt-3" data-bs-ride="carousel">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                        </div>

                        <!-- Slides -->
                        <div class="carousel-inner">
                            @if (count($banners) > 0)
                                @foreach ($banners as $banner)
                                    <div class="carousel-item active">
                                        <img src="{{ $banner->image_url }}" class="d-block w-100" alt="Slide 1"
                                            style="height: 400px;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/img/main-big-baner-12.jpg') }}" class="d-block w-100"
                                        alt="Slide 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/main-big-baner-12.jpg') }}" class="d-block w-100"
                                        alt="Slide 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/main-big-baner-12.jpg') }}" class="d-block w-100"
                                        alt="Slide 3">
                                </div>
                            @endif
                        </div>

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0 py-2">
                &copy; 2025 Typing Test. All Rights Reserved.
                <a href="{{ route('privacy.policy') }}">
                    Privacy Policy
                </a>
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var myCarousel = document.querySelector('#heroCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000,
            ride: 'carousel'
        });
    </script>
</body>

</html>
