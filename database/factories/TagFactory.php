<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrays = ['html', 'css', 'javascript', 'php', 'laravel', 'vue', 'react', 'nodejs', 'python', 'django', 'ruby', 'rails', 'java', 'spring', 'csharp', 'dotnet', 'swift', 'kotlin', 'android', 'ios'];
        $arrays2=['https://placehold.co/600x400/000000/FFF', 'https://placehold.co/600x400/FF0000/FFF', 'https://placehold.co/600x400/00FF00/000', 'https://placehold.co/600x400/0000FF/FFF', 'https://placehold.co/600x400/FFFF00/000', 'https://placehold.co/600x400/00FFFF/000', 'https://placehold.co/600x400/FF00FF/FFF', 'https://placehold.co/600x400/C0C0C0/000', 'https://placehold.co/600x400/808080/FFF', 'https://placehold.co/600x400/800000/FFF', 'https://placehold.co/600x400/808000/000'];
        return [
            'name' =>$arrays[rand(0,10)],
          'image' => $arrays2[rand(0,10)],
        ];
    }
}
