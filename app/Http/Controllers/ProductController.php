<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // =========================
    // LIST PRODUK + SEARCH + FILTER
    // =========================
    public function index(Request $request)
    {
        $query = Product::with('category');

        // 🔍 Search nama produk
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 🎯 Filter kategori (Pria, Wanita, Kids)
        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    // =========================
    // ADMIN DASHBOARD (PAKAI INI)
    // =========================
    public function adminDashboard(Request $request)
    {
        $query = Product::with('category');

        // 🔍 Search
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 🎯 Filter kategori
        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $products = $query->latest()->get();

        return view('admin.dashboard', compact('products'));
    }

    // =========================
    // DETAIL PRODUK
    // =========================
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function create()
    {
        $categories = Category::select('id', 'name')->distinct()->get(); // 🔥 anti double
        return view('admin.products.create', compact('categories'));
    }

    // =========================
    // SIMPAN PRODUK
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', '✨ Produk berhasil ditambah!');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->distinct()->get();

        return view('admin.products.update', compact('product', 'categories'));
    }

    // =========================
    // UPDATE PRODUK
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path('images/products/'.$product->image))) {
                unlink(public_path('images/products/'.$product->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', '✨ Produk berhasil diupdate!');
    }

    // =========================
    // HAPUS PRODUK
    // =========================
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('images/products/'.$product->image))) {
            unlink(public_path('images/products/'.$product->image));
        }

        $product->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
