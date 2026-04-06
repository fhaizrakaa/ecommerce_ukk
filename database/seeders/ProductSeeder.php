<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Kaos Pria',
            'description' => 'Kaos nyaman untuk pria',
            'price' => 100000,
            'stock' => 10,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Dress Wanita',
            'description' => 'Dress cantik untuk wanita',
            'price' => 200000,
            'stock' => 5,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Baju Anak',
            'description' => 'Baju lucu untuk anak',
            'price' => 80000,
            'stock' => 8,
        ]);
    }
}
