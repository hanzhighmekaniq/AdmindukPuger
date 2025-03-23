<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('birth_certifs', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('form');
            $table->string('mom_ktp');
            $table->string('dad_ktp');
            $table->string('maried_certif');
            $table->string('birth_certificate');
            $table->string('new_kk');
            $table->string('witness1_ktp');
            $table->string('witness2_ktp');
            $table->string('status')->nullable()->default('Diproses');
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certifs');
    }
};
