@extends('layouts.admin')

@section('content')

<style>
.container {
    max-width: 1000px;
    margin: auto;
    padding: 20px;
}

.order-card {
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 12px;
    background: #fff;
}

.order-header {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.order-info p {
    margin: 5px 0;
    font-size: 14px;
}

.status {
    color: #d8a7b1;
    font-weight: bold;
}

.item-list {
    padding-left: 18px;
}

.form-update {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 10px;
}

.form-update select {
    padding: 6px;
    border-radius: 6px;
}

.form-update button {
    padding: 6px 12px;
    border: none;
    background: #d8a7b1;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

/* 🔥 RESPONSIVE */
@media (max-width: 768px) {
    .order-card {
        padding: 15px;
    }

    .order-header {
        font-size: 16px;
    }

    .order-info p {
        font-size: 13px;
    }

    .form-update {
        flex-direction: column;
        align-items: stretch;
    }

    .form-update button {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 10px;
    }

    h2 {
        font-size: 18px;
    }
}
</style>

<div class="container">
    <h2 style="margin-bottom:20px;">Daftar Pesanan</h2>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div style="background:#e6ffed;padding:10px;border-radius:8px;color:green;margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div style="background:#fff3cd;padding:15px;border-radius:8px;">
            Belum ada pesanan masuk.
        </div>
    @else

        @foreach($orders as $order)
        <div class="order-card">

            <div class="order-header">
                Order ID: #{{ $order->id }}
            </div>

            <div class="order-info">
                <p><strong>Nama Pembeli:</strong>
                    {{ $order->user->name ?? 'User tidak ditemukan' }}
                </p>

                <p><strong>Total:</strong>
                    Rp {{ number_format($order->total_price) }}
                </p>

                <p><strong>Status:</strong>
                    <span class="status">
                        {{ $order->status }}
                    </span>
                </p>
            </div>

            <hr>

            <h5>Detail Barang:</h5>

            @if($order->items->isEmpty())
                <p>Tidak ada item.</p>
            @else
                <ul class="item-list">
                    @foreach($order->items as $item)
                    <li>
                        {{ $item->product->name ?? 'Produk dihapus' }}
                        ({{ $item->quantity }} x Rp {{ number_format($item->price) }})
                    </li>
                    @endforeach
                </ul>
            @endif

            <hr>

            {{-- Update Status --}}
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="form-update">
                @csrf
                @method('PUT')

                <select name="status" required>
                    <option value="Diproses" {{ $order->status == 'Diproses' ? 'selected' : '' }}>Pesanan Diproses</option>
                    <option value="Dikirim" {{ $order->status == 'Dikirim' ? 'selected' : '' }}>Pesanan Dikirim</option>
                    <option value="Diterima" {{ $order->status == 'Diterima' ? 'selected' : '' }}>Pesanan Diterima</option>
                </select>

                <button type="submit">
                    Update Status
                </button>
            </form>

        </div>
        @endforeach

    @endif

</div>

@endsection
