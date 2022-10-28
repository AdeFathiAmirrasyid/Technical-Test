<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarProduct>
 */
class DaftarProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word(),
            'lokasi' => $this->faker->words(3, true),
            'tersedia' => $this->faker->numberBetween(0, 100),
        ];
    }
}
