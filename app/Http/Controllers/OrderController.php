<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return back()->with('success', 'Status berhasil diperbarui.');
}
public function show($id)
{
    // Mengambil order beserta item dan produk di dalamnya
    $order = Order::with('orderItems.product')->findOrFail($id);

    return view('orders.show', compact('order'));
}
public function history()
{
    $orders = \App\Models\Order::with(['items.product'])
                ->where('user_id', auth()->id())
                ->latest()
                ->get();

    return view('orders.history', compact('orders'));
}

}
