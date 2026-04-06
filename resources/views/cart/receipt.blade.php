<div style="font-family: 'Courier New', Courier, monospace; background: white; padding: 30px; border-radius: 2px; max-width: 400px; margin: 40px auto; border: 1px solid #eee; box-shadow: 0 0 20px rgba(0,0,0,0.03); color: #444;">

    <div style="text-align: center; border-bottom: 2px dashed #fce4ec; padding-bottom: 20px; margin-bottom: 20px;">
        <h2 style="margin: 0; color: #d8a7b1; font-family: 'Poppins', sans-serif;">NOTE PESANAN</h2>
        <p style="font-size: 0.8em; color: #aaa; margin: 5px 0;">ID: #INV-{{ rand(1000, 9999) }} | {{ date('d/m/Y H:i') }}</p>
    </div>

    <div style="font-size: 0.9em; line-height: 1.6; margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between;">
            <span>Penerima:</span>
            <strong>{{ $data['nama'] }}</strong>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <span>No. HP:</span>
            <strong>{{ $data['no_hp'] }}</strong>
        </div>
        <div style="margin-top: 10px;">
            <span>Alamat:</span><br>
            <span style="color: #666; font-style: italic;">{{ $data['alamat'] }}</span>
        </div>
    </div>

    <div style="border-top: 1px solid #fce4ec; border-bottom: 1px solid #fce4ec; padding: 15px 0; margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between; font-size: 1.1em; font-weight: bold;">
            <span>TOTAL TAGIHAN</span>
            <span style="color: #d8a7b1;">Rp {{ number_format($data['final_total']) }}</span>
        </div>
    </div>

    <div style="text-align: center; font-family: 'Poppins', sans-serif;">
        <p style="color: #d8a7b1; margin-bottom: 5px; font-weight: bold;">Terima Kasih!</p>
        <p style="font-size: 0.75em; color: #bbb;">Pesanan Anda sedang kami siapkan.<br>Silahkan screenshot struk ini.</p>

        <button onclick="window.print()" style="margin-top: 20px; background: none; border: 1px solid #d8a7b1; color: #d8a7b1; padding: 5px 15px; border-radius: 20px; font-size: 0.8em; cursor: pointer;">
            🖨️ Cetak Struk
        </button>
    </div>
</div>

<style>
/* ================= RESPONSIVE ================= */

/* Supaya padding tidak bikin melebar */
* {
    box-sizing: border-box;
}

/* Tablet */
@media (max-width: 992px) {
    div[style*="max-width: 400px"] {
        margin: 30px 20px !important;
        padding: 25px !important;
    }
}

/* HP */
@media (max-width: 768px) {

    div[style*="max-width: 400px"] {
        margin: 20px 15px !important;
        padding: 20px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    /* flex jadi lebih fleksibel */
    div[style*="display: flex"] {
        flex-wrap: wrap !important;
    }

    div[style*="display: flex"] span,
    div[style*="display: flex"] strong {
        font-size: 13px !important;
    }

    /* alamat biar tidak kepotong */
    div[style*="font-style: italic"] {
        word-break: break-word;
        font-size: 13px !important;
    }

    button {
        width: 100%;
        padding: 10px !important;
        font-size: 13px !important;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    h2 {
        font-size: 16px !important;
    }

    div[style*="font-size: 0.9em"] {
        font-size: 12px !important;
    }

    div[style*="font-size: 1.1em"] {
        font-size: 14px !important;
    }
}

/* ================= PRINT ================= */
@media print {
    body {
        margin: 0;
        padding: 0;
        background: white;
    }

    div[style*="max-width: 400px"] {
        max-width: 100% !important;
        margin: 0 !important;
        box-shadow: none !important;
        border: none !important;
    }

    button {
        display: none !important;
    }
}
</style>
