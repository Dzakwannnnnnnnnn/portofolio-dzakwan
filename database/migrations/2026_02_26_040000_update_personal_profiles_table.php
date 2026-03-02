<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::table('personal_profiles', function (Blueprint $table) {
      $table->string('role')->nullable()->change();
      $table->text('about')->nullable()->change();
    });
  }

  public function down(): void
  {
    Schema::table('personal_profiles', function (Blueprint $table) {
      $table->string('role')->nullable(false)->change();
      $table->text('about')->nullable(false)->change();
    });
  }
};
