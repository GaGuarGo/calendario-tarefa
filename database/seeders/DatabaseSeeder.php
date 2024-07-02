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

        Tarefa::factory(5)->create([
            'user_id' => 1
        ]);

    }
}
