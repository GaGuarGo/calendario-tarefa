<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,
            'descricao' => $this->faker->paragraph(3),
            'prazo' => now()->addDays(random_int(1, 30)),
            'status' => random_int(0, 1) == 1,
            'start' => Carbon::now()->toDateTimeString(),
            'end' => Carbon::now()->addMinutes(random_int(30, 120)),
        ];
    }
}
