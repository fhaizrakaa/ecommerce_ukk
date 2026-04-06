<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Pria']);
        Category::create(['name' => 'Wanita']);
        Category::create(['name' => 'Kids']);
    }
}
