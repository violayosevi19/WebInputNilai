<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nis' => $this->faker->bothify('##########'),
            'nama_siswa' => $this->faker->name(),
            'email' => fake()->unique()->safeEmail(),
            'jenis_kelamin' => $this->faker->randomElement(['L','P']),
            'kelas_id' => mt_rand(1,2),
            'guru_id' => mt_rand(1,2),
            'user_id' => mt_rand(1,3)
        ];
    }
}
