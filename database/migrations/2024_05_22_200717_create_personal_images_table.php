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
        Schema::create('personal_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_statuses_id')->nullable()->constrained('personal_statuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_images');
    }
};
