<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DieCertif;
use App\Models\Ektp;
use App\Models\FamilyCard;
use App\Models\Submission;
use App\Models\Type;
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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user',
        ]);
        User::factory(20)->create();
        \App\Models\Ektp::factory(50)->create();
        \App\Models\BirthCertif::factory(50)->create();
        \App\Models\DieCertif::factory(50)->create();
        \App\Models\FamilyCard::factory(50)->create();
        \App\Models\MovingLetter::factory(50)->create();
    }

}
