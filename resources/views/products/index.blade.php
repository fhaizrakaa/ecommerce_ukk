<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velours Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>

        /* ================= RESPONSIVE ================= */

/* Tablet */
* {
    box-sizing: border-box;
}
@media (max-width: 992px) {

    .navbar {
        padding: 15px 25px;
    }

    .container {
        gap: 20px;
    }

    .card {
        width: 45%;
    }

    .slider {
        aspect-ratio: 16 / 7;
    }
}

/* HP */
@media (max-width: 768px) {

    .navbar {
        padding: 12px 20px;
    }

    .logo {
        font-size: 16px;
    }

    .nav-right {
        gap: 10px;
    }

    .container {
        padding: 0 15px 30px;
    }

    .card {
        width: 100%; /* 🔥 full width */
        max-width: 350px;
    }

    h2 {
        font-size: 20px;
        margin: 25px 0;
    }

    .slider {
        aspect-ratio: 16 / 9; /* lebih enak di HP */
    }

    .profile img {
        width: 36px;
        height: 36px;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    .navbar {
        flex-direction: row;
        padding: 10px 15px;
    }

    .logo {
        font-size: 14px;
    }

    .cart-icon {
        font-size: 18px;
    }

    .card {
        padding: 15px;
    }

    .card img {
        height: 180px;
    }

    .price {
        font-size: 14px;
    }

    .btn {
        width: 100%;
        text-align: center;
    }
}

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            margin: 0;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            position: relative;
            z-index: 1000;
        }

        .logo {
            font-weight: 600;
            font-size: 18px;
            color: #a678b4;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cart-icon {
            text-decoration: none;
            font-size: 20px;
            color: #444;
            position: relative;
        }

        .logout-btn {
            padding: 6px 16px;
            border-radius: 20px;
            background: #eecbff;
            border: none;
            cursor: pointer;
            font-family: 'Poppins';
        }

        .logout-btn:hover {
            background: #d9a9f0;
        }

        h2 {
            text-align: center;
            margin: 40px 0;
            color: #444;
        }

        .container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            padding-bottom: 40px;
        }

        .card {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            width: 280px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.08);
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 15px;
        }

        .card h4 {
            margin: 15px 0 5px;
            font-weight: 600;
            color: #555;
        }

        .price {
            color: #a678b4;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 30px;
            background: #eecbff;
            color: #444;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #d9a9f0;
        }

        /* Container gambar harus relatif agar label bisa menempel di atasnya */
.card-img-container {
    position: relative;
    width: 100%;
}

/* Style untuk Badge Kategori */
.category-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.9); /* Background putih transparan */
    color: #a678b4; /* Warna teks ungu sesuai tema */
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 10;
}

/* ===== SLIDER ===== */
.slider {
     width: 100%;
    aspect-ratio: 16 / 6;
    overflow: hidden;
    position: relative;
    z-index: 1;
}

.slides {
    display: flex;
    height: 100%;
    transition: transform 0.8s ease-in-out;
}

.slides img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* tetap premium, tidak gepeng */
    flex-shrink: 0;
}

@keyframes slide {
    0% { transform: translateX(0%); }
    30% { transform: translateX(0%); }
    35% { transform: translateX(-100%); }
    65% { transform: translateX(-100%); }
    70% { transform: translateX(-200%); }
    100% { transform: translateX(-200%); }
}

/* ===== PROFILE DROPDOWN ===== */
.profile {
    position: relative;
}

.profile img {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid #eecbff;
    transition: 0.3s;
}

.profile img:hover {
    transform: scale(1.05);
}

.dropdown {
    position: absolute;
    right: 0;
    top: 60px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 200px;
    padding: 10px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: 0.3s ease;
    z-index: 2000;
}

.dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown a,
.dropdown form button {
    display: block;
    width: 100%;
    padding: 8px 10px;
    border: none;
    background: none;
    text-align: left;
    font-family: 'Poppins';
    cursor: pointer;
    text-decoration: none;
    color: #444;
    font-size: 14px;
}

.dropdown a:hover,
.dropdown form button:hover {
    background: #f5e6ff;
    border-radius: 8px;
}

/* ===== SEARCH BAR ===== */
.search-bar {
    display: flex;
    justify-content: center;
    padding: 15px;
}

.search-bar form {
    display: flex;
    gap: 10px;
    width: 100%;
    max-width: 900px;
}

.search-bar input {
    flex: 1;
    padding: 12px 15px;
    border-radius: 25px;
    border: none;
    background: #eee;
    font-size: 14px;
}

.search-bar select {
    padding: 12px;
    border-radius: 20px;
    border: none;
    background: #eee;
}

.search-bar button {
    padding: 12px 18px;
    border-radius: 25px;
    border: none;
    background: #a678b4;
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

.search-bar button:hover {
    background: #8e5fa0;
}

/* 🔥 RESPONSIVE FIX */
@media (max-width: 768px) {

    .search-bar form {
        flex-direction: column; /* ⬅️ biar ga kepotong lagi */
    }

    .search-bar input,
    .search-bar select,
    .search-bar button {
        width: 100%;
    }
}

.cart-badge {
    position: absolute;
    top: -8px;
    right: -10px;
    background: #ff4757;
    color: white;
    font-size: 10px;
    font-weight: bold;
    padding: 3px 6px;
    border-radius: 50%;
    min-width: 15px;
    text-align: center;
}
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<div class="navbar">
    <div class="logo">𐙚⋆ Velours Élite</div>

    <div class="nav-right">
        <!-- Keranjang -->
        <a href="{{ route('cart.index') }}" class="cart-icon">
            🛒
            @auth
                @php $cartCount = \App\Models\Cart::where('user_id', Auth::id())->sum('quantity'); @endphp
                @if($cartCount > 0)
                    <span class="cart-badge">{{ $cartCount }}</span>
                @endif
            @endauth
        </a>

        <!-- Logout -->
        <div class="profile">
           <img src="{{ (Auth::check() && Auth::user()->photo)
            ? asset('images/profile/'.Auth::user()->photo)
            : asset('images/default.png') }}">

            <div class="dropdown" id="profileDropdown">
                <a href="{{ route('profile.edit') }}">Pengaturan Akun</a>
                    {{-- <a href="{{ route('password.change') }}">Ganti Password</a> --}}
                <a href="{{ route('orders.history') }}">Riwayat Pesanan</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="slider">
    <div class="slides" id="slides">
        <img src="{{ asset('images/banner/banner1.png') }}">
        <img src="{{ asset('images/banner/banner2.png') }}">
        <img src="{{ asset('images/banner/banner3.png') }}">
        <img src="{{ asset('images/banner/banner4.png') }}">
    </div>
</div>

<div class="search-bar">
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">

        <select name="category">
            <option value="">Semua Kategori</option>
            <option value="Pria" {{ request('category')=='Pria'?'selected':'' }}>Pria</option>
            <option value="Wanita" {{ request('category')=='Wanita'?'selected':'' }}>Wanita</option>
            <option value="Kids" {{ request('category')=='Kids'?'selected':'' }}>Kids</option>
        </select>

        <button type="submit">🔍 Cari</button>
    </form>
</div>
<h2>✨ Daftar Produk ✨</h2>

<div class="container">
@foreach($products as $product)
    <div class="card">
        <div class="card-img-container">
            <span class="category-badge">{{ $product->category->name }}</span>

            <img src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}">
        </div>

        <h4>{{ $product->name }}</h4>
        <div class="price">Rp {{ number_format($product->price) }}</div>
        <a href="{{ route('product.show',$product->id) }}" class="btn">Lihat Detail</a>
    </div>
@endforeach
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const profileImg = document.querySelector(".profile img");
    const dropdown = document.getElementById("profileDropdown");

    if (profileImg && dropdown) {

        profileImg.addEventListener("click", function (e) {
            e.stopPropagation();
            dropdown.classList.toggle("active");
        });

        document.addEventListener("click", function () {
            dropdown.classList.remove("active");
        });

    }

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const slides = document.getElementById("slides");
    if (!slides) return;

    let index = 0;
    const totalSlides = slides.children.length;

    setInterval(() => {
        index = (index + 1) % totalSlides;
        slides.style.transform = `translateX(-${index * 100}%)`;
    }, 4000);

});
</script>
</body>
</html>
