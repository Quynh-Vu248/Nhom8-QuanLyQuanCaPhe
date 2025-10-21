<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký | LoQu Coffee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('/images/coffee-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            margin-top: 80px;
        }

        .logo {
            display: block;
            margin: auto;
            width: 80px;
            height: 80px;
        }

        h2 {
            text-align: center;
            color: #6f42c1;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="{{ asset('images/logo.png') }}" alt="LoQu Coffee" class="logo mb-3">
        <h2>Tạo tài khoản LoQu Coffee</h2>
        {{ $slot }}
    </div>
</body>
</html>
