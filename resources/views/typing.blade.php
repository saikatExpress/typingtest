<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Start Typing - Typing Test</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #eef2f3, #8e9eab);
            color: #333;
        }

        header {
            background-color: #4facfe;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header .menu {
            display: flex;
            gap: 15px;
        }

        header a {
            text-decoration: none;
            color: #fff;
            padding: 6px 12px;
            font-size: 16px;
            border: 1px solid transparent;
            border-radius: 50px;
            transition: 0.3s;
        }

        header a:hover {
            border-color: #fff;
        }

        main {
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        main h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        main img {
            width: 300px;
            margin: 20px 0;
            animation: bounce 2s infinite;
        }

        main p {
            font-size: 1.2rem;
            line-height: 1.6;
            max-width: 600px;
            margin-bottom: 20px;
        }

        .btn-start {
            display: inline-block;
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-start:hover {
            background-color: #ee5253;
            transform: scale(1.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 10px;
            margin-top: 40px;
        }

        footer a {
            text-decoration: none;
            color: #4facfe;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @media (min-width: 768px) {
            header a {
                font-size: 18px;
                padding: 8px 16px;
            }

            main h1 {
                font-size: 3rem;
            }

            main p {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <h1>Typing Test</h1>
        <nav class="menu">
            <a href="{{ route('typing.type', ['type' => 'regular']) }}">Regular</a>
            <a href="{{ route('typing.type', ['type' => 'exam']) }}">Exam</a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h1>Start Your Typing Journey!</h1>
        <p>
            Test your typing speed and accuracy with our interactive typing tools. Whether you're looking to improve or
            challenge yourself, we have you covered.
        </p>
        <img src="/assets/img/typing.png" alt="Typing Illustration">
        <a href="{{ route('typing.type', ['type' => 'regular']) }}" class="btn-start">Start Typing Now</a>
    </main>

    <!-- Footer -->
    <footer>
        <p>
            © 2025 Typing Test. All Rights Reserved.
            <a href="/privacy-policy">Privacy Policy</a>
        </p>
    </footer>
</body>

</html>
