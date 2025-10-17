<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1>Chi tiết sản phẩm</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p><strong>Mô tả:</strong> {{ $product->description ?? 'Không có mô tả' }}</p>
            <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VND</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">← Quay lại danh sách</a>

</body>
</html>
