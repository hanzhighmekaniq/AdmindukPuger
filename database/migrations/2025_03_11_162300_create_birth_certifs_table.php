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
            $table->string('type')->default('Akta Kelahiran');
            $table->string('name');
            $table->string('form');
            $table->string('mom_ktp');
            $table->string('dad_ktp');
            $table->string('maried_certif');
            $table->string('birth_certificate');
            $table->string('new_kk');
            $table->string('witness1_ktp');
            $table->string('witness2_ktp');
            $table->foreignId('submission_id')
                ->nullable()
                ->constrained('submissions')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
