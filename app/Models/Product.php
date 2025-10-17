<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Cho phép các cột này được gán hàng loạt (mass assignable)
    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
