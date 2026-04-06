<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Velours Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        * {
    box-sizing: border-box;
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
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    position: sticky;
    top: 0;
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
    gap: 15px;
}

.nav-right a {
    text-decoration: none;
    color: #a678b4;
    font-size: 14px;
    font-weight: 500;
}

.logout-btn {
    padding: 6px 14px;
    border-radius: 20px;
    background: #ffebee;
    color: #d32f2f;
    border: none;
    cursor: pointer;
    font-size: 13px;
}

/* ===== SEARCH BAR ===== */
.search-bar {
    display: flex;
    justify-content: center;
    margin: 20px 0;
    padding: 0 15px;
}

.search-bar form {
    display: flex;
    gap: 10px;
    width: 100%;
    max-width: 800px;
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
    padding: 12px 20px;
    border-radius: 25px;
    border: none;
    background: #4a90e2;
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

.search-bar button:hover {
    background: #357bd8;
}

/* ===== HEADER ===== */
.admin-header {

    text-align: center;
    margin: 20px auto 10px;
    padding: 0 15px;
    max-width: 600px; /* 🔥 biar ga terlalu lebar */
}
.admin-header h2 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #444;
    line-height: 1.4;
}

.btn-add {
    background: #a678b4;
    color: white;
    padding: 12px 20px;
    border-radius: 30px;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
    font-size: 14px;
    width: 100%; /* 🔥 biar full & ga kepotong */
    max-width: 300px;
}

/* ===== PRODUK ===== */
.container {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
    justify-content: center;
    padding: 30px 15px;
}

.card {
    background: #ffffffcc;
    border-radius: 20px;
    width: 260px;
    padding: 18px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.05);
    position: relative;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 15px;
}

.category-tag {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #fff;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 10px;
    color: #a678b4;
    font-weight: 600;
}

.price {
    color: #a678b4;
    font-weight: 600;
    margin-top: 5px;
}

.admin-actions {
    display: flex;
    gap: 8px;
    margin-top: 12px;
}

.btn-edit {
    flex: 1;
    background: #f3e5f5;
    color: #a678b4;
    text-align: center;
    padding: 7px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13px;
}

.btn-delete {
    background: #ffebee;
    color: #d32f2f;
    border: none;
    padding: 7px 10px;
    border-radius: 10px;
    cursor: pointer;
}

/* ===== RESPONSIVE ===== */

/* Tablet */
@media (max-width: 768px) {

    .navbar {
        padding: 12px 15px;
    }

    .logo {
        font-size: 14px;
    }

    .nav-right {
        gap: 8px;
    }

    .nav-right a {
        font-size: 12px;
    }

    .logout-btn {
        font-size: 12px;
        padding: 5px 10px;
    }

    .search-bar form {
        display: flex;
        gap: 10px;
        width: 100%;
        max-width: 800px;
        flex-wrap: wrap;
    }

    .search-bar button {
        width: 100%;
    }

    .card {
        width: 100%;
        max-width: 320px;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    .logo {
        font-size: 13px;
    }

    .btn-add {
        width: 100%;
    }

    .card {
        padding: 15px;
    }

}

@media (max-width: 768px) {

    .search-bar form {
        flex-direction: column; /* ⬅️ ini kunci utama */
    }

    .search-bar input,
    .search-bar select,
    .search-bar button {
        width: 100%;
    }
}
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">𐙚⋆ Admin Velours Élite</div>
    <div class="nav-right">
        <a href="{{ route('admin.orders') }}">📥 Pesanan</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<!-- 🔍 SEARCH + FILTER -->
<div class="search-bar">
    <form method="GET" action="{{ route('admin.dashboard') }}">
        <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">

        <select name="category">
            <option value="">Semua Kategori</option>
            <option value="Pria" {{ request('category')=='Pria'?'selected':'' }}>Pria</option>
            <option value="Wanita" {{ request('category')=='Wanita'?'selected':'' }}>Wanita</option>
            <option value="Kids" {{ request('category')=='Kids'?'selected':'' }}>Kids</option>
        </select>

        <button type="submit">Cari</button>
    </form>
</div>

<div class="admin-header">
    <h2>Manajemen Koleksi Produk ✨✨</h2>
    <a href="{{ route('products.create') }}" class="btn-add">+ Tambah Produk</a>
</div>

<div class="container">
@forelse($products as $product)
    <div class="card">
        <span class="category-tag">{{ $product->category->name }}</span>

        <img src="{{ asset('images/products/'.$product->image) }}">

        <h4>{{ $product->name }}</h4>
        <div class="price">Rp {{ number_format($product->price) }}</div>
        <div>Stok: {{ $product->stock }}</div>

        <div class="admin-actions">
            <a href="{{ route('products.edit',$product->id) }}" class="btn-edit">Edit</a>

            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn-delete">🗑</button>
            </form>
        </div>
    </div>
@empty
    <p>Tidak ada produk ditemukan</p>
@endforelse
</div>

</body>
</html>
