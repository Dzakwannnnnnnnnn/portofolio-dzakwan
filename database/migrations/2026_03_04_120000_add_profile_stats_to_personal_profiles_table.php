<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('personal_profiles', function (Blueprint $table) {
            $table->unsignedInteger('experience_years')->default(0)->after('location');
            $table->unsignedInteger('total_projects')->default(0)->after('experience_years');
            $table->unsignedInteger('total_certifications')->default(0)->after('total_projects');
        });
    }

    public function down(): void
    {
        Schema::table('personal_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'experience_years',
                'total_projects',
                'total_certifications',
            ]);
        });
    }
};
