<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Services\QuestionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class saveQuestionTest extends TestCase
{
    // 👇 Cette ligne est CRUCIALE : Elle vide la BDD de test après chaque test
    // pour repartir sur une base propre.
    use RefreshDatabase;

    public function test_if_create_question()
    {
        // --- 1. ARRANGE (Préparer) ---
        // On crée 3 utilisateurs avec des scores différents
        $user = User::factory()->create();

        $tag = 'histoire';

        $question_text = 'Qui a découvert l\'Amérique ?';

        $answers = [
            'Christophe Colomb',
            'Vasco de Gama',
            'Ferdinand Magellan',
            'Marco Polo'
        ];

        $correct_answer = 0;

        $data = [
            'tag' => $tag,
            'question_text' => $question_text,
            'answers' => $answers,
            'correct_answer' => $correct_answer
        ];

        // --- 2. ACT (Agir) ---
        // On appelle la méthode
        $test = new QuestionService();
        $results = $test->saveQuestion($data, null, $user->id);

        // --- 3. ASSERT (Vérifier) ---

        $this->assertEquals($tag, $results->tag);
        $this->assertEquals($question_text, $results->question_text);
        $this->assertNotNull($results->user_id);

        // Vérifie qu'il y a bien une ligne dans la table 'questions'
        $this->assertDatabaseHas('questions', [
            'question_text' => 'Qui a découvert l\'Amérique ?',
            'user_id' => $user->id,
            'tag' => 'histoire'
        ]);

        // Vérifie qu'il y a bien 4 réponses dans la table 'answers' liées à cette question
        $this->assertDatabaseCount('answers', 4);

        // Vérifie spécifiquement la bonne réponse
        $this->assertDatabaseHas('answers', [
            'question_id' => $results->id,
            'answer_text' => 'Christophe Colomb',
            'is_correct' => true
        ]);
  
    }
}
