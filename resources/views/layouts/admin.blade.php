<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #eef2f7, #d9e4f5);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #1e293b;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .navbar-left {
            font-size: 18px;
            font-weight: bold;
        }

        .navbar-right a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 14px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .navbar-right a:hover {
            background: #334155;
        }

        /* ===== CONTAINER ===== */
        .container {
            padding: 40px;
        }

        /* ===== CARD STYLE ===== */
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        /* ===== BUTTON ===== */
        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .btn-success:hover {
            background: #059669;
        }

        select {
            padding: 7px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        h2 {
            margin-bottom: 20px;
        }

        /* ================= RESPONSIVE ================= */

/* Tablet */
@media (max-width: 992px) {
    .container {
        padding: 25px;
    }

    .navbar {
        padding: 15px 25px;
    }
}

/* HP */
@media (max-width: 768px) {

    .navbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        padding: 15px 20px;
    }

    .navbar-left {
        font-size: 16px;
    }

    .navbar-right {
        width: 100%;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .navbar-right a {
        margin-left: 0;
        padding: 8px 12px;
        font-size: 14px;
    }

    .container {
        padding: 20px 15px;
    }

    .card {
        padding: 18px;
        border-radius: 10px;
    }

    h2 {
        font-size: 18px;
    }

    .btn {
        font-size: 13px;
        padding: 7px 12px;
    }

    select {
        width: 100%;
        margin-top: 5px;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    .navbar {
        padding: 12px 15px;
    }

    .navbar-left {
        font-size: 14px;
    }

    .navbar-right {
        flex-direction: column;
        align-items: flex-start;
    }

    .navbar-right a {
        width: 100%;
        background: transparent;
    }

    .navbar-right a.active {
    background: #3b82f6;
    }

    .card {
        padding: 15px;
    }

    h2 {
        font-size: 16px;
    }
}

    </style>
</head>
<body>

    <div class="navbar">
        <div class="navbar-left">
            Admin Panel
        </div>

        <div class="navbar-right">
            <a href="/admin">Dashboard</a>
            <a href="/admin/orders">Pesanan</a>
            {{-- <a href="/">Website</a> --}}
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
