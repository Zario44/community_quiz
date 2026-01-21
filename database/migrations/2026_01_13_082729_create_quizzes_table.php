<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Table des Quiz
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 2. Table des Questions
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // NOUVEAUTÉ : user_id pour que l'utilisateur possède ses questions même sans quiz
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // MODIFICATION : quiz_id est maintenant "nullable" car la question peut être seule
            $table->foreignId('quiz_id')->nullable()->constrained()->onDelete('set null');
            
            $table->text('question_text');
            
            // NOUVEAUTÉ : Le tag pour le classement par thème
            $table->string('tag')->nullable(); 
            
            $table->timestamps();
        });

        // 3. Table des Réponses
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->string('answer_text');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // L'ordre est important ici pour éviter les erreurs de clés étrangères !
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('quizzes');
    }
};