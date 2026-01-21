<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // fake()->sentence() génère une phrase de "Lorem Ipsum"
            'question_text' => fake()
            ->sentence(6) . ' ?', // Question avec 6 mots
            'tag' => fake()->word(), // Un mot aléatoire comme tag

            
            // MAGIE : Crée automatiquement un User pour cette question
            // ou utilise un ID existant si on lui demande.
            'user_id' => User::factory(),
        ];
    }
}
