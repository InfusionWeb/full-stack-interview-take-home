<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween( '-1 year', now());
        $updatedAt = fake()->dateTimeBetween($createdAt, now());

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'message' => fake()->paragraph(),
            'submitted_at' => $createdAt,
            'is_spam' => false,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
