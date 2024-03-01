<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use App\Models\Priority;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Priority::create([
            'priority' => 'Low',
        ]);
        Priority::create([
            'priority' => 'Medium',
        ]);
        Priority::create([
            'priority' => 'High',
        ]);

        Status::create([
            'status' => 'Not Done'
        ]);
        Status::create([
            'status' => 'To Do'
        ]);
        Status::create([
            'status' => 'Need Review'
        ]);
        Status::create([
            'status' => 'Done'
        ]);
    }
}
