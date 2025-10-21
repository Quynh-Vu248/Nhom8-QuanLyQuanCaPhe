<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AuthProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', ['products' => $products]);
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        return view('products.create'); // ✅ view đúng
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('auth.products.index')
                         ->with('success', 'Thêm sản phẩm thành công!');
    }

    // Hiển thị form sửa sản phẩm
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('auth.products.edit', compact('product'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('auth.products.index')
                         ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('auth.products.index')
                         ->with('success', 'Xóa sản phẩm thành công!');
    }
}
