<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{env("APP_NAME")}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        a.button {
            display: inline-block;
            margin: 10px;
            padding: 12px 30px;
            font-size: 1rem;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            transition: background 0.3s ease;
        }
        a.button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Authentication Task App</h1>
        <p>This app demonstrates user registration and login in Laravel.</p>
        <a href="{{ route('register') }}" class="button">Register</a>
        <a href="{{ route('login') }}" class="button">Login</a>
    </div>
</body>
</html>
