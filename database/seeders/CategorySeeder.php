<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'All In One Bilgisayar'],
            ['name' => 'Laptop'],
            ['name' => 'Masaüstü Bilgisayar'],
            ['name' => 'Monitör'],
            ['name' => 'Klavye'],
            ['name' => 'Mouse'],
            ['name' => 'Yazıcı'],
            ['name' => 'Tarayıcı'],
            ['name' => 'Hoparlör'],
            ['name' => 'Televizyon'],
            ['name' => 'Power Supply'],
            ['name' => 'Sunucular'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}