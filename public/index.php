<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Autoload các class từ Composer
require __DIR__.'/../vendor/autoload.php';

// Khởi tạo ứng dụng Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Xử lý request trực tiếp qua $app
$request = Request::capture();
$response = $app->handle($request);

$response->send();
$app->terminate($request, $response);
