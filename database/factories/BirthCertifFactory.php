<?php

namespace Database\Factories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

class BirthCertifFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => 'Akta Kelahiran',
            'name' => $this->faker->name,
            'form' => 'form.pdf',
            'mom_ktp' => 'mom_ktp.pdf',
            'dad_ktp' => 'dad_ktp.pdf',
            'maried_certif' => 'maried_certif.pdf',
            'birth_certificate' => 'birth_certificate.pdf',
            'new_kk' => 'new_kk.pdf',
            'witness1_ktp' => 'witness1_ktp.pdf',
            'witness2_ktp' => 'witness2_ktp.pdf',
            'submission_id' => Submission::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
