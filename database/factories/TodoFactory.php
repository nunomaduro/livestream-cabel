<?php

namespace Database\Factories;

use App\Enums\TodoStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TodoFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text(),
            'status' => $this->faker->randomElement(TodoStatus::cases()),
            'color' => $this->faker->randomElement(['zinc', 'yellow', 'red', 'green', 'blue']),
        ];
    }
}
