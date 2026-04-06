<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Velours Élite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        h2 {
            color: #444;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #a678b4;
            font-size: 14px;
            font-weight: 500;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #eecbff;
            outline: none;
            font-family: 'Poppins';
            transition: 0.3s;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #a678b4;
            box-shadow: 0 0 8px rgba(166, 120, 180, 0.2);
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: #a678b4;
            color: white;
            border: none;
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            font-size: 15px;
        }

        .btn-submit:hover {
            background: #8e5fa0;
            transform: translateY(-2px);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #aaa;
            text-decoration: none;
            font-size: 13px;
        }

        /* ✅ RESPONSIVE BREAKPOINT */
        @media (max-width: 768px) {
            .form-card {
                padding: 25px;
                border-radius: 18px;
            }

            h2 {
                font-size: 20px;
            }

            input, select, textarea {
                padding: 10px 12px;
                font-size: 13px;
            }

            .btn-submit {
                padding: 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .form-card {
                padding: 20px;
            }

            h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<div class="form-card">
    <h2>✨ Tambah Koleksi Baru</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" placeholder="Contoh: Silk Ribbon Dress" required>
        </div>

        <div class="form-group">
            <label>Harga Produk</label>
            <input type="text" id="rupiah" placeholder="Rp 0" required>
            <input type="hidden" name="price" id="price_real">
        </div>

        <select name="category_id" class="form-control">
            @foreach($categories->unique('name') as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <div class="form-group">
            <label>Stok Produk</label>
            <input type="number" name="stock" placeholder="0" min="0" required>
        </div>

        <div class="form-group">
            <label>Deskripsi Produk</label>
            <textarea name="description" rows="3" placeholder="Ceritakan detail produk ini..."></textarea>
        </div>

        <div class="form-group">
            <label>Foto Produk</label>
            <input type="file" name="image" required>
            <p style="font-size: 11px; color: #888; margin-top: 5px;">
                Format: JPG, PNG, WEBP (Maks. 2MB)
            </p>
        </div>

        <button type="submit" class="btn-submit">Simpan Produk</button>
        <a href="{{ route('admin.dashboard') }}">⬅ Kembali ke Dashboard</a>
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

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>

</body>
</html>
