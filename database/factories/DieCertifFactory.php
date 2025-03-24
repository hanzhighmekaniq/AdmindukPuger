<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DieCertif>
 */use App\Models\Submission;

class DieCertifFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => 'Akta Kematian',
            'name' => $this->faker->name,
            'form' => 'form.pdf',
            'death_certificate' => 'death_cert.pdf',
            'maried_certificate' => 'maried_cert.pdf',
            'kk' => 'kk.pdf',
            'ktp' => 'ktp.pdf',
            'submission_id' => Submission::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
