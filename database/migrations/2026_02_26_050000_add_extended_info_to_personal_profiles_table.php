<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::table('personal_profiles', function (Blueprint $table) {
      $table->string('phone')->nullable()->after('about');
      $table->text('address')->nullable()->after('phone');
      $table->string('birth_place')->nullable()->after('address');
      $table->date('birth_date')->nullable()->after('birth_place');
      $table->string('last_education')->nullable()->after('birth_date');
      $table->string('location')->nullable()->after('last_education');
    });
  }

  public function down(): void
  {
    Schema::table('personal_profiles', function (Blueprint $table) {
      $table->dropColumn(['phone', 'address', 'birth_place', 'birth_date', 'last_education', 'location']);
    });
  }
};
