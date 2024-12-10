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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'ketua yayasan']);
        Role::create(['name' => 'kepala sekolah']);
        Role::create(['name' => 'wakil kepala sekolah']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'tendik']);
    }
}
