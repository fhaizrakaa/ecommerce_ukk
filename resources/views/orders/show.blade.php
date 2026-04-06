<div class="receipt">
    <h2>STRUK PESANAN</h2>
    <hr>

    <p><strong>No. Pesanan:</strong> #{{ $order->id }}</p>
    <p><strong>Nama:</strong> {{ $order->nama }}</p>
    <p><strong>Alamat:</strong> {{ $order->alamat }}</p>

    <hr>

    <table>
        @foreach($order->orderItems as $item)
        <tr>
            <td>{{ $item->product->name }} (x{{ $item->quantity }})</td>
            <td class="text-right">
                Rp {{ number_format($item->price * $item->quantity) }}
            </td>
        </tr>
        @endforeach
    </table>

    <hr>

    <h3 class="total">
        <span>Total:</span>
        <span>Rp {{ number_format($order->total_price) }}</span>
    </h3>

    <p class="thanks">Terima kasih telah berbelanja!</p>

    <button onclick="window.print()" class="print-btn no-print">
        Cetak Struk
    </button>
</div>

<style>
    body {
        margin: 0;
        padding: 20px;
        font-family: sans-serif;
        background: #f5f5f5;
    }

    .receipt {
        max-width: 400px;
        width: 100%;
        margin: auto;
        padding: 20px;
        border: 1px solid #eee;
        background: white;
        border-radius: 10px;
    }

    h2 {
        text-align: center;
        font-size: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    td {
        padding: 5px 0;
        vertical-align: top;
    }

    .text-right {
        text-align: right;
        white-space: nowrap;
    }

    .total {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
    }

    .thanks {
        text-align: center;
        color: #888;
        font-size: 13px;
    }

    .print-btn {
        width: 100%;
        padding: 10px;
        background: #d8a7b1;
        color: white;
        border: none;
        cursor: pointer;
        margin-top: 20px;
        border-radius: 8px;
    }

    /* 📱 RESPONSIVE */
    @media (max-width: 480px) {
        body {
            padding: 10px;
        }

        .receipt {
            padding: 15px;
        }

        h2 {
            font-size: 18px;
        }

        table {
            font-size: 13px;
        }

        .total {
            font-size: 14px;
        }
    }

    /* 🖨 PRINT MODE */
    @media print {
        body {
            background: white;
            padding: 0;
        }

        .receipt {
            border: none;
            box-shadow: none;
            max-width: 100%;
        }

        .no-print {
            display: none;
        }
    }
</style>

<script>
    window.onload = function() {
        window.print();
    }
</script>
