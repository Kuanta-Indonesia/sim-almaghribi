<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
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
        $id = Role::create(['nama' => 'admin']);
        Role::create(['nama' => 'kepala sekolah']);
        Role::create(['nama' => 'wakil kepala sekolah']);
        Role::create(['nama' => 'guru']);
        Role::create(['nama' => 'tendik']);
        User::create([
            'nama' => 'bintang admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'kode' => '1222228282828',
            'role_id' => $id->id,
            'no_hp' => '081234567890',
        ]);
    }
}
