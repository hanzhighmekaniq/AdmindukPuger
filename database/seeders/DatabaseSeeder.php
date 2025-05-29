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
            'nik' => '123',
            'nokk' => '123123'
        ]);
        // Buat 20 user acak
        $users = User::factory(20)->create();

        // Ambil ID user yang baru dibuat
        $userIds = $users->pluck('id')->toArray();

        // Buat 50 submission dengan user_id dari 20 user yang dibuat
        Submission::factory(50)->create([
            'user_id' => function () use ($userIds) {
                return $userIds[array_rand($userIds)];
            },
        ]);

        // Type::create([
        //     "name" => "KTP",
        // ]);

        // Type::create([
        //     "name" => "Akta Kelahiran",
        // ]);
        // Type::create([
        //     "name" => "Kartu Keluarga",
        // ]);
        // Type::create([
        //     "name" => "Akta Kematian",
        // ]);
        // Type::create([
        //     "name" => "Surat Pindah",
        // ]);
        // User::create([
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('123'),
        //     'role' => 'user',
        // ]);
        // \App\Models\BirthCertif::factory(50)->create();
        // \App\Models\DieCertif::factory(50)->create();
        // \App\Models\FamilyCard::factory(50)->create();
        // \App\Models\MovingLetter::factory(50)->create();
    }
}
