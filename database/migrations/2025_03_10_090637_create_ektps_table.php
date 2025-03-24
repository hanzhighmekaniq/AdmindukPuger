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
        Schema::create('ektps', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('KTP');
            $table->string('name');
            $table->string('kk');
            $table->string('form');
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
        Schema::dropIfExists('ektps');
    }
};
