<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} | Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .product-card {
            max-width: 700px;
            margin: 60px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .product-header {
            background: linear-gradient(135deg, #6f42c1, #6610f2);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .product-body {
            padding: 30px;
        }

        .product-body h3 {
            font-weight: 600;
            color: #333;
        }

        .product-price {
            font-size: 1.3rem;
            color: #dc3545;
            font-weight: bold;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="product-card">
        <div class="product-header">
            <h1>Chi tiết sản phẩm</h1>
        </div>
        <div class="product-body">
            <h3>{{ $product->name }}</h3>
            <hr>
            <p><strong>Mô tả:</strong></p>
            <p class="text-muted">
                {{ $product->description ?? 'Không có mô tả cho sản phẩm này.' }}
            </p>

            <p class="product-price">
                💰 {{ number_format($product->price, 0, ',', '.') }} VND
            </p>

            <a href="{{ route('auth.products.index') }}" class="btn btn-outline-secondary btn-back">
                ← Quay lại danh sách
            </a>
        </div>
    </div>

    <footer>
        © {{ date('Y') }} Cửa hàng Cafe. Mọi quyền được bảo lưu ☕
    </footer>

</body>
</html>
