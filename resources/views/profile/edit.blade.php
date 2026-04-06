<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile - Velours Élite</title>

    <!-- WAJIB untuk responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            margin: 0;
            padding: 20px;
        }

        .card {
            max-width: 600px;
            width: 100%;
            margin: auto;
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #a678b4;
            margin-bottom: 25px;
            font-size: 22px;
        }

        .profile-preview {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-preview img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #eecbff;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-family: 'Poppins';
            font-size: 14px;
        }

        button {
            margin-top: 15px;
            padding: 12px;
            border-radius: 20px;
            border: none;
            background: #eecbff;
            cursor: pointer;
            width: 100%;
            font-size: 14px;
        }

        button:hover {
            background: #d9a9f0;
        }

        .section {
            margin-bottom: 30px;
        }

        .success {
            color: green;
            font-size: 13px;
        }

        .error {
            color: red;
            font-size: 13px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #777;
            font-size: 14px;
        }

        .back-link:hover {
            color: #a678b4;
        }

        /* RESPONSIVE HP */
        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .card {
                padding: 20px;
                border-radius: 15px;
            }

            h2 {
                font-size: 18px;
            }

            .profile-preview img {
                width: 90px;
                height: 90px;
            }

            input, button {
                font-size: 13px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h2>✨ Edit Profile ✨</h2>

    <!-- FOTO PROFILE -->
    <div class="section">
        <div class="profile-preview">
            <img src="{{ Auth::user()->photo
                ? asset('images/profile/'.Auth::user()->photo)
                : asset('images/default.png') }}">
        </div>

        @if(session('success_photo'))
            <p class="success">{{ session('success_photo') }}</p>
        @endif

        <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="photo" required>
            <button type="submit">Update Foto</button>
        </form>
    </div>

    <!-- GANTI PASSWORD -->
    <div class="section">
        @if(session('success_password'))
            <p class="success">{{ session('success_password') }}</p>
        @endif

        @if(session('error_password'))
            <p class="error">{{ session('error_password') }}</p>
        @endif

        <form action="{{ route('profile.update.password') }}" method="POST">
            @csrf
            <input type="password" name="current_password" placeholder="Password Lama" required>
            <input type="password" name="new_password" placeholder="Password Baru" required>
            <input type="password" name="new_password_confirmation" placeholder="Konfirmasi Password Baru" required>

            <button type="submit">Ganti Password</button>
        </form>
    </div>
    <a href="{{ route('products.index') }}" class="back-link">← Kembali ke Produk</a>
</div>

</body>
</html>
