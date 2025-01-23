<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/text.png') }}" type="image/x-icon">
    <title>Welcome - Typing Test</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #4facfe, #00f2fe);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            padding: 20px;
            max-width: 600px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #ee5253;
            transform: scale(1.1);
        }

        .illustration {
            margin: 20px auto;
            width: 100%;
            max-width: 300px;
            animation: bounce 2s infinite;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Typing Test</h1>
        <p>
            Enhance your typing speed and accuracy with our interactive test.
            Challenge yourself and track your progress over time.
        </p>
        <a href="{{ route('user.dashboard') }}" class="btn">Start Typing Test</a>
        <img src="/assets/img/typing.png" alt="Typing Illustration" class="illustration">
    </div>
</body>

</html>