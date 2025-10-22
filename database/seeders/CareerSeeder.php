<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    public function run()
    {
        DB::table('careers')->insert([
            [
                'title' => 'Software Engineer',
                'company' => 'OpenToWork',
                'start_date' => '2020-01-01',
                'end_date' => '2022-01-01',
                'description' => 'Developed software solutions.',
                'status' => 1,
            ],
            // Diğer kayıtlar buraya eklenebilir
        ]);
    }
}