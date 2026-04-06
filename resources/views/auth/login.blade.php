<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Velours Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        * {
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fdfbfb, #ebedee);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.card {
    background: #ffffffcc;
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 25px;
    width: 100%;
    max-width: 380px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.05);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

input, select {
    width: 100%;
    padding: 12px;
    margin-bottom: 12px;
    border-radius: 12px;
    border: 1px solid #ddd;
    font-size: 14px;
}

.btn {
    width: 100%;
    padding: 12px;
    border-radius: 25px;
    border: none;
    background: #eecbff;
    cursor: pointer;
    font-weight: 500;
}

.btn:hover {
    background: #d9a9f0;
}

.divider {
    text-align: center;
    margin: 15px 0;
    font-size: 14px;
    color: #888;
}

.msg {
    text-align: center;
    margin-bottom: 10px;
    font-size: 14px;
}

input:focus, select:focus {
    border-color: #d8a7b1;
    outline: none;
    box-shadow: 0 0 5px rgba(216,167,177,0.4);
}
    </style>
</head>
<body>

<div class="card">

    <h2>𐙚⋆ Velours Élite</h2>

    @if(session('error'))
        <div class="msg error">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div class="msg success">{{ session('success') }}</div>
    @endif

    <!-- LOGIN -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
    </form>

    <div class="divider">ATAU DAFTAR</div>

    <!-- REGISTER -->
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="user">User (Pembeli)</option>
            <option value="admin">Admin (Penjual)</option>
        </select>

        <button type="submit" class="btn">Daftar</button>
    </form>

</div>

</body>
</html>
