<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm mới | Cửa hàng Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-card {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 35px;
        }

        .form-card h2 {
            text-align: center;
            color: #6f42c1;
            margin-bottom: 30px;
            font-weight: 600;
        }

        label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #6f42c1;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5a32a3;
        }

        .btn-secondary {
            background-color: #adb5bd;
            border: none;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="form-card">
        <h2>➕ Thêm sản phẩm mới</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Lỗi!</strong> Vui lòng kiểm tra lại thông tin nhập.
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Mô tả ngắn về sản phẩm"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá (VNĐ)</label>
                <input type="number" name="price" class="form-control" min="0" step="1000" placeholder="Nhập giá sản phẩm" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">← Quay lại</a>
                <button type="submit" class="btn btn-primary px-4">💾 Lưu sản phẩm</button>
            </div>
        </form>
    </div>

    <footer>
        © {{ date('Y') }} Cửa hàng Cafe — Quản lý sản phẩm ☕
    </footer>

</body>
</html>
