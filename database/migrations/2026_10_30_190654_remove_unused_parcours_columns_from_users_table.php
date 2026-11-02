
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'education_level',
                'diploma',
                'specialty',
                'institution',
                'experience',
                'skills',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('education_level')->nullable();
            $table->string('diploma')->nullable();
            $table->string('specialty')->nullable();
            $table->string('institution')->nullable();
            $table->text('experience')->nullable();
            $table->text('skills')->nullable();
        });
    }
};
