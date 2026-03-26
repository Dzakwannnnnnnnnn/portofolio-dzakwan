<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('github_url')->nullable()->after('link');
            $table->string('demo_url')->nullable()->after('github_url');
            $table->text('technologies')->nullable()->after('demo_url');
            $table->string('project_role')->nullable()->after('technologies');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'github_url',
                'demo_url',
                'technologies',
                'project_role',
            ]);
        });
    }
};
