<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('educations', function (Blueprint $table) {
            $table->string('activity_type')->default('Pendidikan')->change();
            $table->string('developed_skills', 500)->nullable()->after('description');
        });

        DB::table('educations')
            ->where('activity_type', 'Sekolah')
            ->update(['activity_type' => 'Pendidikan']);
    }

    public function down(): void
    {
        Schema::table('educations', function (Blueprint $table) {
            $table->string('activity_type')->default('Sekolah')->change();
            $table->dropColumn('developed_skills');
        });

        DB::table('educations')
            ->where('activity_type', 'Pendidikan')
            ->update(['activity_type' => 'Sekolah']);
    }
};
