<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subkriteria>
 */
class SubkriteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idkriteria'    =>  fake()->randomNumber(1),
            'subkriteria'   =>  fake()->text(10),
            'keterangan'    =>  fake()->paragraph(1),
            'poin'          =>  fake()->randomNumber(1)
        ];
    }
}
