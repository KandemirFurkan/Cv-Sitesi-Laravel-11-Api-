<?php

namespace Database\Seeders;

use App\Models\Tag;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\BlogSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Blog::create([

        'name'=>'Laravel ile Web Geliştirme',
        'content'=>'Laravel, PHP tabanlı popüler bir web uygulama çatısıdır. MVC mimarisini kullanarak hızlı ve güvenli web uygulamaları geliştirmeyi sağlar.',
        'category_id'=>2

       ]);

    }
}
