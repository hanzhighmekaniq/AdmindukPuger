<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'user',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
            'address' => 'Jl, MH. Thamrin'
        ]);
        User::create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'address' => 'Jl, MH. Thamrin'
        ]);
        User::create([
            'name' => 'hanz',
            'role' => 'admin',
            'email' => 'hanzslurrr@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'Jl, MH. Thamrin'
        ]);

        Type::create([
            "name" => "KTP",
        ]);
        Type::create([
            "name" => "Akta Kelahiran",
        ]);
        Type::create([
            "name" => "Kartu Keluarga",
        ]);
        Type::create([
            "name" => "Akta Kematian",
        ]);
        Type::create([
            "name" => "Surat Pindah",
        ]);
        Submission::create([
            "user_id" => "1",
            "type_id" => "1",
            "name" => "Hanif Febriansyah",
            "status" => "Disetujui",
        ]);
        Submission::create([
            "user_id" => "1",
            "type_id" => "1",
            "name" => "Fadias Nur Ahmadi",
            "status" => "Diproses",
        ]);
        Submission::create([
            "user_id" => "1",
            "type_id" => "1",
            "name" => "Ahmad Rifa'i",
            "status" => "Ditolak",
        ]);
        // FamilyCard::create([
        //     "ktp" => "misalnya_kk.jpg",
        //     "maried_certificated" => "misalnya_kk.jpg",
        //     "form" => "misalnya_form.jpg",
        // ]);
    }
}
