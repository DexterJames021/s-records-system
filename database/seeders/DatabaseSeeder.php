<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
            Subject::factory()->count(10)->create();

        // $this->call(StudentSeeder::class);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'student@example.com',
        //     'password' => 'password',
        // ]);
    }
}
