<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'role' => 'admin',
            // 'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
