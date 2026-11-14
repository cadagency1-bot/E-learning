<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            if (!Schema::hasColumn('cours', 'video2_url')) {
                $table->string('video2_url', 500)->nullable()->after('video_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            if (Schema::hasColumn('cours', 'video2_url')) {
                $table->dropColumn('video2_url');
            }
        });
    }
};