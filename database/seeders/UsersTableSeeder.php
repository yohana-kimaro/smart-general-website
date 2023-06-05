<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Yohana',
            'lastname' => 'Kimaro',
            'email' => 'yohana.kimaro@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('Admin@yohana987_'),
        ]);
    }
}
