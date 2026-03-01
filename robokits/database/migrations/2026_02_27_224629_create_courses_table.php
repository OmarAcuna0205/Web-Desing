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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // [cite: 156]
            $table->string('cover_image'); // [cite: 157]
            $table->text('content'); // [cite: 158]
        
            $table->foreignId('robotics_kit_id')
                ->constrained()
                ->cascadeOnDelete(); // [cite: 159, 160, 161]
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
