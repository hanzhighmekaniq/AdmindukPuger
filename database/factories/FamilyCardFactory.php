<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Submission;

class FamilyCardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => 'Kartu Keluarga',
            'name' => $this->faker->name,
            'ktp' => 'ktp.pdf',
            'maried_certificated' => 'maried_certificated.pdf',
            'form' => 'form.pdf',
            'submission_id' => Submission::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

