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
        Schema::create('die_certifs', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('Akta Kematian');
            $table->string('name');
            $table->string('form');
            $table->string('death_certificate');
            $table->string('maried_certificate')->nullable();
            $table->string('kk');
            $table->string('ktp');
            $table->timestamps();
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
        Schema::dropIfExists('die_certifs');
    }
};
