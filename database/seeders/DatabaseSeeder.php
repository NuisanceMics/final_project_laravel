<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $this->call(admins::class);//to register the seeders

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=> '12345678',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> '87654321',
        ]);
    }
}
