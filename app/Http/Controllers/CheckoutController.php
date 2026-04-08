<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{

public function index(Request $request)
{
    $selectedItems = $request->selected_items;

    if (!$selectedItems) {
        return redirect()->route('cart.index')
            ->with('error', 'Pilih minimal 1 produk dulu!');
    }

    $carts = \App\Models\Cart::whereIn('id', $selectedItems)
        ->where('user_id', auth()->id())
        ->with('product')
        ->get();

    $total = 0;
    foreach ($carts as $cart) {
        $total += $cart->product->price * $cart->quantity;
    }

    return view('checkout.index', compact('carts', 'total'));
}

    public function process(Request $request)
    {
        // ... (Kode validasi tetap sama) ...
        $request->validate([
            'nama' => 'required|min:3',
            'no_hp' => 'required',
            'alamat' => 'required',
            'items' => 'required|array'
        ]);

        // ... (Kode pembuatan order tetap sama) ...
        $order = Order::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'total_price' => $request->final_total,
            'status' => 'pending'
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['qty'],
                'price' => $item['price']
            ]);

            // --- TAMBAHKAN KODE INI DI SINI ---
    // Hapus barang dari keranjang milik user yang sedang login
    // Kita hapus produk yang baru saja dibeli
    $productIds = collect($request->items)->pluck('product_id');
    \App\Models\Cart::where('user_id', Auth::id())
        ->whereIn('product_id', $productIds)
        ->delete();
            // Tambahkan baris ini jika model Product belum di-import di atas:
            \App\Models\Product::where('id', $item['product_id'])
                ->decrement('stock', $item['qty']);
        }

        // --- UBAH BAGIAN INI ---
        // Alihkan ke route invoice/struk dengan mengirimkan ID Order
        return redirect()->route('orders.show', $order->id);
    }
}
