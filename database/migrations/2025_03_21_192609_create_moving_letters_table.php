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
        Schema::create('moving_letters', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('Surat Pindah');
            $table->string('name');
            $table->string('kk');
            $table->string('ktp');
            $table->string('maried_certificate');
            $table->string('moving_later_certificate');
            $table->string('consent_partner');
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
        Schema::dropIfExists('moving_letters');
    }
};
