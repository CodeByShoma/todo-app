<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // タスク名
            'description' => $this->faker->paragraph(), // 説明
            'is_done' => false, // 最初は未完了
            'due_date' => $this->faker->dateTimeBetween('now', '+1 week'), // 締切
        ];
    }
}
