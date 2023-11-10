<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hitung>
 */
class HitungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idalternatif'  =>  fake()->randomNumber(1),
            'idkriteria'    =>  fake()->randomNumber(1),
            'nilai'         =>  fake()->randomNumber(1)
        ];
    }
}
