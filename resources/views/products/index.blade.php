<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm | Cửa hàng Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #4a148c;
        }

        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            padding: 25px;
        }

        .btn-success {
            background-color: #6f42c1;
            border: none;
        }

        .btn-success:hover {
            background-color: #5a32a3;
        }

        .table thead {
            background: linear-gradient(135deg, #6f42c1, #6610f2);
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f0ff;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #888;
            font-size: 0.9rem;
        }

        .btn-sm {
            border-radius: 8px;
        }

        .alert-success {
            border-radius: 10px;
        }
    </style>
</head>
<body class="p-4">

    <div class="container">
        <h1>☕ Danh sách sản phẩm</h1>

        <div class="table-container">
            <!-- Nút thêm sản phẩm -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-success px-4">
                    + Thêm sản phẩm
                </a>
                <small class="text-muted">Tổng số sản phẩm: {{ $products->count() }}</small>
            </div>

            <!-- Hiển thị thông báo -->
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Bảng danh sách -->
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th width="25%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->description ?? 'Không có mô tả' }}</td>
                            <td class="text-danger fw-bold">
                                {{ number_format($product->price, 0, ',', '.') }} đ
                            </td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">👁 Xem</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">✏️ Sửa</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">
                                        🗑 Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Chưa có sản phẩm nào</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        © {{ date('Y') }} Cửa hàng Cafe — Quản lý sản phẩm chuyên nghiệp ☕
    </footer>

</body>
</html>
