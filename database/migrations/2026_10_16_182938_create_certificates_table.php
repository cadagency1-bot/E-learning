
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('formation_id')
                ->constrained('formations')
                ->cascadeOnDelete();

            $table->string('certificate_number', 80)->unique();

            $table->string('name_on_certificate', 150);

            $table->timestamp('issued_at');

            $table->timestamps();

            $table->unique(
                ['user_id', 'formation_id'],
                'certificates_user_formation_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
