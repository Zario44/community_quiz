<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 
use App\Models\Question;
use App\Models\Answer;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. On appelle tes seeders personnalisés
        $this->call([
            AdminSeeder::class,     
            QuestionSeeder::class, // Tu pourras décommenter ça quand tu l'auras créé
        ]);

        // 2. (Optionnel) Créer un utilisateur de test en plus
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory(5)
        ->has(
            Question::factory()->count(5)
                ->has(
                    Answer::factory()->count(3)     
                        // ... et qui a 1 réponse bonne (on force l'état)
                        ->has(Answer::factory()->state(['is_correct' => true]))))
                        ->create();

    }
}