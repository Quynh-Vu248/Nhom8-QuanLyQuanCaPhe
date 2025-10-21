<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng của user
    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    // Tạo đơn hàng (từ sản phẩm)
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $quantity = $request->input('quantity', 1);
        $total = $product->price * $quantity;

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'total_price' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');
    }
}
