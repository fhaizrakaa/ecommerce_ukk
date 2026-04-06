<div style="font-family: 'Poppins', sans-serif; background: #fffafb; padding: 30px; border-radius: 20px; max-width: 550px; margin: 40px auto; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #fce4ec;">

    <h2 style="color: #d8a7b1; text-align: center; margin-bottom: 25px;">
        Data Pengiriman 🚚
    </h2>

    <form action="{{ route('checkout.process') }}" method="GET">
        @csrf

        <input type="hidden" name="final_total" value="{{ $total }}">

        {{-- RINGKASAN PESANAN --}}
        <div style="margin-bottom: 25px;">
            <label style="display:block; color:#b08968; margin-bottom:10px; font-weight:600; font-size:0.9em; text-transform:uppercase; letter-spacing:1px;">
                Ringkasan Pesanan
            </label>

            <div style="background:white; border-radius:15px; border:1px solid #fce4ec; overflow:hidden;">
                @foreach($carts as $index => $cart)
                    <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $cart->product_id }}">
                    <input type="hidden" name="items[{{ $index }}][qty]" value="{{ $cart->quantity }}">
                    <input type="hidden" name="items[{{ $index }}][price]" value="{{ $cart->product->price }}">

                    <div style="display:flex; align-items:center; padding:12px; border-bottom:1px solid #fff5f6;">
                        <img src="{{ asset('images/products/'.$cart->product->image) }}"
                             style="width:50px; height:50px; border-radius:8px; object-fit:cover; margin-right:12px;">

                        <div style="flex-grow:1;">
                            <div style="font-size:0.9em; color:#555; font-weight:500;">
                                {{ $cart->product->name }}
                            </div>
                            <div style="font-size:0.8em; color:#aaa;">
                                {{ $cart->quantity }} x Rp {{ number_format($cart->product->price) }}
                            </div>
                        </div>

                        <div style="font-size:0.9em; color:#d8a7b1; font-weight:600;">
                            Rp {{ number_format($cart->product->price * $cart->quantity) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- NAMA --}}
        <div style="margin-bottom:15px;">
            <label for="nama" style="display:block; color:#b08968; margin-bottom:8px; font-weight:500;">
                Nama Lengkap
            </label>
            <input type="text" id="nama" name="nama"
                   placeholder="Masukkan nama penerima"
                   required minlength="3"
                   style="width:100%; padding:12px; border:1px solid #fce4ec; border-radius:12px; outline:none; background:white;">
        </div>

        {{-- NO HP --}}
        <div style="margin-bottom:15px;">
            <label for="no_hp" style="display:block; color:#b08968; margin-bottom:8px; font-weight:500;">
                Nomor HP / WhatsApp
            </label>
            <input type="tel" id="no_hp" name="no_hp"
                   placeholder="08xxxxxxxxxx"
                   required pattern="^08[0-9]{8,12}$"
                   style="width:100%; padding:12px; border:1px solid #fce4ec; border-radius:12px; outline:none; background:white;">
        </div>

        {{-- ALAMAT --}}
        <div style="margin-bottom:20px;">
            <label for="alamat" style="display:block; color:#b08968; margin-bottom:8px; font-weight:500;">
                Alamat Pengiriman
            </label>
            <textarea id="alamat" name="alamat"
                      rows="4"
                      required minlength="10"
                      placeholder="Contoh: Jl. Melati No.10, RT02/RW05, Kecamatan..., Kota..., Kode Pos..."
                      style="width:100%; padding:14px; border:1px solid #fce4ec; border-radius:12px; outline:none; background:white; font-family:inherit; resize:vertical;">
            </textarea>
        </div>

        {{-- TOTAL --}}
        <div style="background:#fdf2f4; padding:15px; border-radius:15px; margin-bottom:25px; border:1px dashed #d8a7b1;">
            <span style="color:#777;">Total Pembayaran:</span>
            <strong style="float:right; color:#d8a7b1; font-size:1.2em;">
                Rp {{ number_format($total) }}
            </strong>
        </div>

        <button type="submit"
                style="width:100%; padding:15px; background:#d8a7b1; color:white; border:none; border-radius:30px; font-weight:bold; font-size:1em; cursor:pointer; box-shadow:0 4px 15px rgba(216,167,177,0.4);">
            Konfirmasi Pesanan
        </button>

    </form>
</div>

<style>
/* ================= GLOBAL ================= */
* {
    box-sizing: border-box;
}

/* ================= RESPONSIVE ================= */

/* Tablet */
@media (max-width: 992px) {
    div[style*="max-width: 550px"] {
        margin: 30px 20px !important;
        padding: 25px !important;
    }
}

/* HP */
@media (max-width: 768px) {

    /* card utama */
    div[style*="max-width: 550px"] {
        margin: 20px 15px !important;
        padding: 20px !important;
        border-radius: 15px !important;
    }

    h2 {
        font-size: 20px !important;
    }

    /* list produk */
    div[style*="display:flex"] {
        flex-wrap: wrap !important;
        align-items: flex-start !important;
    }

    /* gambar */
    div[style*="display:flex"] img {
        width: 45px !important;
        height: 45px !important;
        margin-bottom: 5px;
    }

    /* info produk full */
    div[style*="flex-grow:1"] {
        width: 100% !important;
    }

    /* harga pindah ke bawah */
    div[style*="color:#d8a7b1"] {
        width: 100% !important;
        text-align: right !important;
        margin-top: 5px;
    }

    /* input */
    input, textarea {
        font-size: 14px !important;
        padding: 10px !important;
    }

    textarea {
        min-height: 90px;
    }

    /* total */
    div[style*="float:right"] {
        float: none !important;
        display: block;
        text-align: right;
        margin-top: 5px;
    }

    /* button */
    button {
        padding: 12px !important;
        font-size: 14px !important;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    h2 {
        font-size: 18px !important;
    }

    input, textarea {
        font-size: 13px !important;
    }

    button {
        font-size: 13px !important;
    }
}
</style>
