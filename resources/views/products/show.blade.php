<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>

        /* ================= RESPONSIVE ================= */

/* Tablet */
@media (max-width: 992px) {

    .detail-card {
        width: 100%;
        padding: 25px;
        gap: 20px;
    }

    .detail-card img {
        width: 250px;
        height: 250px;
    }
}

/* HP */
@media (max-width: 768px) {

    .navbar {
        padding: 15px 20px;
    }

    .logo {
        font-size: 16px;
    }

    .nav-right {
        gap: 10px;
    }

    .container {
        padding: 30px 15px;
    }

    .detail-card {
        flex-direction: column; /* 🔥 penting */
        align-items: center;
        text-align: center;
        padding: 20px;
        border-radius: 20px;
    }

    .detail-card img {
        width: 100%;
        max-width: 280px;
        height: auto;
    }

    .detail-info {
        width: 100%;
    }

    .price {
        font-size: 20px;
    }

    input[type="number"] {
        width: 100%;
        max-width: 100px;
        text-align: center;
    }

    .btn {
        width: 100%;
    }

    .back-link {
        display: block;
        text-align: center;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    .navbar {
        flex-direction: row;
        padding: 12px 15px;
    }

    .logo {
        font-size: 14px;
    }

    .detail-card {
        padding: 15px;
    }

    h2 {
        font-size: 18px;
    }

    .price {
        font-size: 18px;
    }
}
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            margin: 0;
        }

        .navbar {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
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

        .container {
            display: flex;
            justify-content: center;
            padding: 50px 20px;
        }

        .detail-card {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 40px;
            width: 800px;
            display: flex;
            gap: 40px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        }

        .detail-card img {
            width: 350px;
            height: 350px;
            object-fit: cover;
            border-radius: 20px;
        }

        .detail-info {
            flex: 1;
        }

        .category {
            background: #f3d9ff;
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .price {
            font-size: 22px;
            color: #a678b4;
            font-weight: 600;
            margin: 15px 0;
        }

        .stock {
            margin-bottom: 15px;
            font-size: 14px;
            color: #666;
        }

        input[type="number"] {
            padding: 8px;
            border-radius: 10px;
            border: 1px solid #ddd;
            width: 70px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 30px;
            background: #eecbff;
            color: #444;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: 'Poppins';
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #d9a9f0;
        }

        .btn-disabled {
            background: #ddd;
            cursor: not-allowed;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #777;
        }

        .back-link:hover {
            color: #a678b4;
        }
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
    </style>
</head>
<script>
    setTimeout(() => {
        const alertBox = document.querySelector('[style*="background: #d4edda"]');
        if(alertBox){
            alertBox.style.display = 'none';
        }
    }, 3000);
</script>
<body>

<div class="navbar">
    <div class="logo">𐙚⋆ Velours Élite</div>

    <div class="nav-right">

        @auth
            @if(auth()->user()->role === 'user')
                <a href="{{ route('cart.index') }}" class="cart-icon">🛒</a>
            @endif

            <div class="profile">
            <img src="{{ Auth::user()->photo
            ? asset('images/profile/'.Auth::user()->photo)
            : asset('images/default.png') }}">

            <div class="dropdown" id="profileDropdown">
                <a href="{{ route('profile.edit') }}">Pengaturan Akun</a>
                    {{-- <a href="{{ route('password.change') }}">Ganti Password</a> --}}

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        @endauth

    </div>
</div>

<div class="container">
    <div class="detail-card">

        <img src="{{ asset('images/products/'.$product->image) }}"
             onerror="this.src='https://via.placeholder.com/350'">

        <div class="detail-info">

            @if(session('success'))
    <div style="
        background: #d4edda;
        color: #155724;
        padding: 10px 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        font-size: 14px;
    ">
        {{ session('success') }}
    </div>
@endif
            <h2>{{ $product->name }}</h2>

            <div class="category">
                {{ $product->category->name }}
            </div>

            <div class="price">
                Rp {{ number_format($product->price) }}
            </div>

            <div class="stock">
                Stok tersedia: <strong>{{ $product->stock }}</strong>
            </div>

            {{-- HANYA USER YANG BISA BELANJA --}}
            @auth
                @if(auth()->user()->role === 'user')

                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf

                            <label>Quantity:</label><br>
                            <input type="number"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   max="{{ $product->stock }}"
                                   required>

                            <br>

                            <button type="submit" class="btn">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    @else
                        <button class="btn btn-disabled" disabled>
                            Stok Habis
                        </button>
                    @endif

                @endif
            @endauth

            <a href="{{ route('products.index') }}" class="back-link">
                ← Kembali ke Produk
            </a>

        </div>
    </div>
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

</body>
</html>
