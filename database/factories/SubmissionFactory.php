<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), // Pastikan user ada
            'type' => $this->faker->randomElement(['Surat Pindah', 'KTP', 'KK']),
            'name' => $this->faker->name,
            'data' => json_encode([
                'field1' => $this->faker->word,
                'field2' => $this->faker->sentence,
            ]), // Isi data agar tidak NULL
            'status' => $this->faker->randomElement(['Diproses', 'Ditolak', 'Disetujui', 'Selesai']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
