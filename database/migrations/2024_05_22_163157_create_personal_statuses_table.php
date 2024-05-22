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
        Schema::create('personal_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nationality_id')->unique();
            $table->string('family_code')->nullable();
            $table->string('address')->nullable();
            $table->string('wife_name')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('children_number')->nullable();
            $table->longText('notes')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->nullable()->constrained('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_statuses');
    }
};
