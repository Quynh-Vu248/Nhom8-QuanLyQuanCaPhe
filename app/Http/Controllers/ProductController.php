<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // dùng model Product để lấy dữ liệu từ DB

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm.
     */
    public function index()
    {
        $products = Product::all(); // lấy tất cả sản phẩm từ DB
        return view('products.index', compact('products')); // truyền vào view
    }

    /**
     * Hiển thị form thêm sản phẩm mới.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Lưu sản phẩm mới vào database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    /**
     * Hiển thị chi tiết 1 sản phẩm.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Hiển thị form sửa sản phẩm.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Cập nhật sản phẩm trong database.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Xóa sản phẩm.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Đã xóa sản phẩm!');
    }
}
