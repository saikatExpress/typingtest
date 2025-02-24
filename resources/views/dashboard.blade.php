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
            padding: 15px 0;
        }

        .navbar-brand img {
            height: 50px;
            /* Adjust logo size */
        }

        .navbar-nav {
            margin: auto;
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
            color: white;
            font-size: 20px;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .fa-youtube {
            color: red;
        }

        .fa-youtube:hover,
        .social-icons a:hover {
            color: #5CA7CE;
        }

        /* Body CSS */
        .card-img-top {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 10px auto;
            display: block;
            border: 1px solid #fff;
        }

        .bg-color-custom {
            background-color: #33C5FE;
        }

        .card {
            transition: box-shadow 0.3s ease-in-out;
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
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img style="border-radius: 4px;" src="{{ asset('uploads/' . $setting->project_logo) }}"
                        alt="I2U Computer">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('typing.type', ['type' => 'regular']) }}">Regular</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('typing.type', ['type' => 'exam']) }}">Exam</a></li>
                    </ul>

                    <!-- Right Social Icons (Now inside collapsible menu) -->
                    <div class="social-icons text-center mt-3 d-lg-none">
                        <a href="{{ $setting->fb_link }}"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{ $setting->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{ $setting->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Right Social Icons (Visible only on large screens) -->
                <div class="social-icons d-none d-lg-block">
                    <a href="{{ $setting->fb_link }}"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ $setting->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{ $setting->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-color-custom">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6 home">
                    <h2>Meet Our Leaders</h2>
                    <div class="py-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('uploads/' . $setting->president_image) }}" class="card-img-top"
                                alt="...">
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
                        <div class="card text-center shadow-sm" style="width: 18rem;">
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
                <div class="col-md-6 home">
                    <h2>Start Your Typing Journey!</h2>
                    <p class="py-3 fs-4">Test your typing speed and accuracy with our interactive typing tools. Whether
                        you're looking to improve or challenge yourself, we have you covered.</p>
                    <img src="{{ asset('uploads/' . $setting->cover_image) }}" alt="" style="width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0 py-2">&copy; 2025 Typing Test. All Rights Reserved. <a
                    href="{{ route('privacy.policy') }}">Privacy Policy</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
