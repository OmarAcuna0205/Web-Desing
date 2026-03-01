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
        Schema::create('robotics_kits', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // [cite: 150]
            $table->text('description')->nullable(); // [cite: 151]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robotics_kits');
    }
};
