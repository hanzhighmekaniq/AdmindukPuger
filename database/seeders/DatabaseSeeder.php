<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ektp;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'user1',
            'role' => 'user',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12'),
            'address' => 'Jl, MH. Thamrin'
        ]);

        Ektp::create([
            "kk" => "misalnya_kk.jpg",
            "form" => "misalnya_form.jpg",
            "user_id" => 1
        ]);


    }
}
