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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->longText('data');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->enum('status', ['Disetujui', 'Ditolak', 'Diproses', 'Selesai'])->default('Diproses');
            $table->string('notes')->nullable();
            $table->string('subtype')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
