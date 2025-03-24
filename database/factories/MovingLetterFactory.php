<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Submission;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovingLetter>
 */

class MovingLetterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => 'Surat Pindah',
            'name' => $this->faker->name,
            'kk' => 'kk.pdf',
            'ktp' => 'ktp.pdf',
            'maried_certificate' => 'maried_certificate.pdf',
            'moving_later_certificate' => 'moving_later_certificate.pdf',
            'consent_partner' => 'consent_partner.pdf',
            'submission_id' => Submission::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
