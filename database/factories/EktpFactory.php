<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Submission;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ektp>
 */

class EktpFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => 'KTP',
            'name' => $this->faker->name,
            'kk' => 'kk.pdf',
            'form' => 'form.pdf',
            'submission_id' => Submission::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

