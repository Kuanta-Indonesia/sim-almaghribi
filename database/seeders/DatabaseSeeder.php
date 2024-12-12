<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create(['nama' => 'admin']);
        Role::create(['nama' => 'ketua yayasan']);
        Role::create(['nama' => 'kepala sekolah']);
        Role::create(['nama' => 'wakil kepala sekolah']);
        Role::create(['nama' => 'guru']);
        Role::create(['nama' => 'tendik']);
    }
}
