<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Score;
use App\Repositories\ScoreRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScoreRepositoryTest extends TestCase
{
    // 👇 Cette ligne est CRUCIALE : Elle vide la BDD de test après chaque test
    // pour repartir sur une base propre.
    use RefreshDatabase;

    public function test_it_returns_top_10_scores_in_order()
    {
        // --- 1. ARRANGE (Préparer) ---
        // On crée 3 utilisateurs avec des scores différents
        $user1 = User::factory()->create(['name' => 'Champion']);
        Score::create(['user_id' => $user1->id, 'score' => 100]);

        $user2 = User::factory()->create(['name' => 'Débutant']);
        Score::create(['user_id' => $user2->id, 'score' => 10]);

        $user3 = User::factory()->create(['name' => 'Moyen']);
        Score::create(['user_id' => $user3->id, 'score' => 50]);

        // --- 2. ACT (Agir) ---
        // On appelle ta méthode
        $repository = new ScoreRepository();
        $results = $repository->bestScores();

        // --- 3. ASSERT (Vérifier) ---
        
        // Vérification A : On a bien récupéré 3 scores
        $this->assertCount(3, $results);

        // Vérification B : Le premier est bien "Champion" (100 pts)
        $this->assertEquals('Champion', $results[0]->name);
        $this->assertEquals(100, $results[0]->score);

        // Vérification C : Le deuxième est bien "Moyen" (50 pts)
        // (Vérifie que le tri DESC fonctionne)
        $this->assertEquals('Moyen', $results[1]->name);
    }
}