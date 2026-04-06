<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            margin: 0;
        }
    </style>
</head>
<body>

    @yield('content')

    @yield('scripts')

</body>
</html>
