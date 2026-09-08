<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TugasFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(4),
            'deskripsi' => $this->faker->paragraph(),
            'deadline' => $this->faker->dateTimeBetween('now', '+2 weeks'),
            'prioritas' => $this->faker->randomElement(['rendah', 'sedang', 'tinggi']),
            'selesai' => false,
        ];
    }
}