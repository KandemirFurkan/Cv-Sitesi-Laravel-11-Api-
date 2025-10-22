<?php

namespace Database\Seeders;

use App\Models\Tag;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Category::create([
        'name'=>'Web Tasarım',
        'image'=>'categories/technology.jpg',
       ]);
       Category::create([
        'name'=>'Yazılım',
        'image'=>'categories/technology.jpg',
       ]);
       Category::create([
        'name'=>'Dijital Pazarlama',
        'image'=>'categories/technology.jpg',
       ]);
    }
}
