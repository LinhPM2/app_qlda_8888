<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@hehe.vn',
            'password' => '$2y$10$gs4RJb.JkYOx1ZpCgXtZxONAHgNTD7S1kKAFbv7ZWqrU2EQNsnYF.',
            'roles'=>"ADMIN",
        ]);
        //----------------------------------------------------------------
        $this->call([
            DealerSeeder::class,
        ]);
    }
}
