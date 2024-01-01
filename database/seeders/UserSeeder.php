<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::query()->create([
            'name' => 'Super Admin',
            'email' => 'super@email.com',
            'password' => Hash::make('12345678')
        ]);

        $superAdmin->roles()->attach(1);

        $admin = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678')
        ]);

        $admin->roles()->attach(2);

        $user = User::query()->create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('12345678')
        ]);

        $user->roles()->attach(3);

        $autor = User::query()->create([
            'name' => 'Author',
            'email' => 'autor@email.com',
            'password' => Hash::make('12345678')
        ]);

        $autor->roles()->attach(4);
        
    }
}
