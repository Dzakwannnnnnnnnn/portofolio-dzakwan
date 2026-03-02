<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('personal_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->text('about');
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('github')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('personal_profiles');
    }
};