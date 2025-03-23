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
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('Kartu Keluarga');
            $table->string('name');
            $table->string('ktp');
            $table->string('maried_certificated');
            $table->string('form');
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
        Schema::dropIfExists('family_cards');
    }
};
