<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Gabriel Gomes',
            'email' => 'gabrielguarnierigomes@gmail.com'
        ]);

        User::factory(5)->create();

        Tarefa::factory(10)->create([
            'user_id' => 1
        ]);

        Tarefa::factory(10)->create([
            'user_id' => 1,
            'prazo' => now(),
        ]);

        Tarefa::factory(10)->create([
            'user_id' => 1,
            'prazo' => now()->subtract(random_int(1,5), 'days'),
        ]);

    }
}
