<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Une phrase aléatoire pour la réponse
            'answer_text' => fake()->sentence(3),

            // Par défaut, la réponse est fausse (boolean)
            'is_correct' => false,
        ];
    }
}