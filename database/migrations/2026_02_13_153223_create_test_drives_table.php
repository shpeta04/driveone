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
        Schema::create('test_drives', function (Blueprint $table) {
                $table->id();
                $table->foreignId('car_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->date('preferred_date');
                $table->string('preferred_time')->nullable();
                $table->text('message')->nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_drives');
    }
};
