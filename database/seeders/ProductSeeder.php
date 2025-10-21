<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Cà phê sữa đá',
            'description' => 'Cà phê pha phin truyền thống với sữa đặc',
            'price' => 25000,
            'image' => 'caphe-suada.jpg',
        ]);
    }
}
