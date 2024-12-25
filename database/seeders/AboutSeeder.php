<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        About::create([
            'title' => 'Hakkımızda',
            'content' => 'Merhaba ben Furkan. Web geliştirme ile ilgileniyorum. Bu blogda sizlere yazılar paylaşacağım.',
        ]);
    }
}
