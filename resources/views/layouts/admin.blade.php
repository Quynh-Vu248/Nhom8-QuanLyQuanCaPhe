<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị sản phẩm | LoQu Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            padding: 25px;
        }
        footer {
            text-align: center;
            margin-top: 50px;
            color: #888;
            font-size: 0.9rem;
        }
        img.rounded {
            object-fit: cover;
            height: 60px;
            width: 80px;
        }
    </style>
</head>
<body class="p-4">
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center text-primary">☕ Quản trị sản phẩm - LoQu Coffee</h1>
        </header>

        @yield('content')

        <footer>
            © {{ date('Y') }} LoQu Coffee Admin
        </footer>
    </div>
</body>
</html>
