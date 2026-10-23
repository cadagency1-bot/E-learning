
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_progress', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('formation_id')
                ->constrained('formations')
                ->cascadeOnDelete();

            $table->foreignId('cours_id')
                ->constrained('cours')
                ->cascadeOnDelete();

            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->unique(
                ['user_id', 'formation_id', 'cours_id'],
                'lesson_progress_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_progress');
    }
};
