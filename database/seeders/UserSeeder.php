<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::factory()->count(10)->create([
            'password' => '$2y$10$gs4RJb.JkYOx1ZpCgXtZxONAHgNTD7S1kKAFbv7ZWqrU2EQNsnYF.',
            'roles'=>"USER",
        ]);
    }
}
