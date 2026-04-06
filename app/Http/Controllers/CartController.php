<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderItem;

class CartController extends Controller
{
    // TAMBAH KE KERANJANG
    public function add(Request $request, $id)
{
    $product = \App\Models\Product::findOrFail($id);

    $cart = \App\Models\Cart::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->first();

    if ($cart) {
        $cart->quantity += $request->quantity;
        $cart->save();
    } else {
        \App\Models\Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'quantity' => $request->quantity
        ]);
    }

    // ✅ Tetap di halaman sebelumnya + kirim pesan sukses
    return redirect()->back()->with('success', 'Produk berhasil dimasukkan ke keranjang!');
}
    // TAMPILKAN KERANJANG
    public function index()
    {
    $carts = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

    return view('cart.index', compact('carts'));
}

    // HAPUS ITEM
    public function remove($id)
{
    $cart = Cart::findOrFail($id);
    $cart->delete();

    // Pastikan mengirimkan 'success' ke session
    return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
}

    // CHECKOUT
    // 1. Menampilkan Halaman Formulir Alamat & Nama
public function checkout(Request $request)
{
    $request->validate([
        'address_id' => 'required'
    ]);

    $cartItems = auth()->user()->cartItems;

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Keranjang kosong!');
    }

    $total = 0;

    foreach ($cartItems as $item) {
        $total += $item->product->price * $item->quantity;
    }

    $order = Order::create([
        'user_id' => Auth::id(),
        'address_id' => $request->address_id, // WAJIB ADA
        'total_price' => $total,
        'status' => 'Diproses'
    ]);

    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price
        ]);
    }

    auth()->user()->cartItems()->delete();

    return redirect()->route('home')
        ->with('success', 'Pesanan berhasil dibuat!');
}

// 2. Memproses Pesanan, Mengurangi Stok, dan Menampilkan Struk
public function processCheckout(Request $request)
{
    $data = $request->validate([
        'nama' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'final_total' => 'required',
        'items' => 'required|array' // Menangkap hidden input tadi
    ]);

    foreach ($request->items as $item) {
        $product = Product::find($item['id']);

        if ($product && $product->stock >= $item['qty']) {
            $product->stock -= $item['qty'];
            $product->save();
        } else {
            return redirect()->route('cart.index')->with('error', 'Stok ' . $product->name . ' tidak mencukupi!');
        }
    }

    // Kosongkan keranjang user setelah semua stok aman
    Cart::where('user_id', auth()->id())->delete();

    // Kirim data tambahan ke struk agar bisa menampilkan list barang di struk
    $purchasedItems = $request->items;
    return view('cart.receipt', compact('data', 'purchasedItems'));
}

public function adminOrders()
{
    $orders = Order::with(['user', 'items.product'])
                    ->latest()
                    ->get();

    return view('admin.orders.index', compact('orders'));
}

public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $request->validate([
        'status' => 'required'
    ]);

    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Status berhasil diupdate!');
}

public function update(Request $request)
{
    $cart = \App\Models\Cart::where('id', $request->id)
        ->where('user_id', auth()->id())
        ->first();

    if ($cart) {
        $cart->quantity = $request->quantity;
        $cart->save();
    }

    return response()->json(['success' => true]);
}
}
