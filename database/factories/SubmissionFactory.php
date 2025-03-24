<?php

namespace Database\Factories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => rand(3,20),
            'type_id'  => "ini gimana caranya biar ga random, mirip sama kayak di masing masing form",
            'name' => $this->faker->name,
            'status' => $this->faker->randomElement(['Diproses', 'Ditolak', 'Disetujui']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
