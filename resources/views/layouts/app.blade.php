<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
            background-color: #1c3056;
        }

        nav {
            background-color: #152146;
            padding: 15px 20px;
            display: flex;
            gap: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover { text-decoration: underline; }

        .content {
            padding: 30px 40px; /* <-- This makes your content start away from the left edge */
            max-width: 900px;
        }

        h1, h2, p {
            margin: 0 0 15px 0;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/emails">Form Test</a>
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>