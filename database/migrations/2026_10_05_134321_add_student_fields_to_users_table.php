<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');

            $table->enum('role', ['admin', 'student'])
                ->default('student')
                ->after('phone');

            $table->enum('status', [
                'pending',
                'accepted',
                'rejected',
                'confirmed'
            ])->default('pending')->after('role');

            $table->string('confirmation_code')->nullable()->after('status');

            $table->timestamp('confirmed_at')->nullable()->after('confirmation_code');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'role',
                'status',
                'confirmation_code',
                'confirmed_at',
            ]);
        });
    }
};