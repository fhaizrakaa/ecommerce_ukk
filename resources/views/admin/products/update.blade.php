<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk - Velours Élite</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #fdfbfb, #ebedee); display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; margin:0; }
        .form-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(15px); padding: 40px; width: 100%; max-width: 500px; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); border: 1px solid rgba(255, 255, 255, 0.3); }
        h2 { color: #444; text-align: center; margin-bottom: 30px; font-weight: 600; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #a678b4; font-size: 14px; font-weight: 500; }
        input, select, textarea { width: 100%; padding: 12px 15px; border-radius: 12px; border: 1px solid #eecbff; outline: none; font-family: 'Poppins'; box-sizing: border-box; }
        .btn-update { width: 100%; padding: 15px; background: #a678b4; color: white; border: none; border-radius: 15px; font-weight: 600; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        .btn-update:hover { background: #8e5fa0; transform: translateY(-2px); }
        .current-img { margin-top: 10px; border-radius: 10px; width: 100px; height: 100px; object-fit: cover; border: 2px solid #eecbff; }

        /* ===== RESPONSIVE ===== */

/* Tablet */
@media (max-width: 768px) {
    body {
        padding: 20px;
        align-items: flex-start;
    }

    .form-card {
        padding: 25px;
        border-radius: 20px;
    }

    h2 {
        font-size: 20px;
    }
}

/* HP */
@media (max-width: 480px) {
    body {
        padding: 15px;
    }

    .form-card {
        padding: 20px;
        border-radius: 18px;
    }

    h2 {
        font-size: 18px;
    }

    input,
    select,
    textarea {
        font-size: 14px;
        padding: 10px;
    }

    .btn-update {
        padding: 12px;
        font-size: 14px;
    }

    .current-img {
        width: 80px;
        height: 80px;
    }
}
    </style>
</head>
<body>

<div class="form-card">
    <h2>✨ Edit Koleksi</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label>Harga Produk</label>
            <input type="text" id="rupiah" value="Rp {{ number_format($product->price, 0, ',', '.') }}" required>
            <input type="hidden" name="price" id="price_real" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stock" value="{{ $product->stock }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Foto Produk (Kosongkan jika tidak diganti)</label>
            <input type="file" name="image">
            <img src="{{ asset('images/products/'.$product->image) }}" class="current-img">
        </div>

        <button type="submit" class="btn-update">Simpan Perubahan</button>
        <a href="{{ route('admin.dashboard') }}" style="display:block; text-align:center; margin-top:15px; color:#aaa; text-decoration:none; font-size:13px;">Kembali</a>
    </form>
</div>

<script>
    var rupiah = document.getElementById('rupiah');
    var price_real = document.getElementById('price_real');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp ');
        price_real.value = this.value.replace(/[^0-9]/g, '');
    });
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^0-9]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) { separator = sisa ? '.' : ''; rupiah += separator + ribuan.join('.'); }
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>
</body>
</html>
