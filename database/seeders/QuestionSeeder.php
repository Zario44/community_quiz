<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Question 1 : Histoire ---
        $q1 = Question::create([
            'question_text' => 'Quelle était la couleur du cheval blanc d\'Henry IV ?',
            'user_id' => 1,
            'tag' => 'Histoire'
        ]);
        $q1->answers()->createMany([
            ['answer_text' => 'Noir', 'is_correct' => false],
            ['answer_text' => 'Gris', 'is_correct' => false],
            ['answer_text' => 'Blanc', 'is_correct' => true], // La bonne réponse
            ['answer_text' => 'Marron', 'is_correct' => false],
        ]);

        // --- Question 2 : Géographie ---
        $q2 = Question::create([
            'question_text' => 'Quelle est la capitale de la France ?',
            'user_id' => 1,
            'tag' => 'Géographie'
        ]);

        $q2->answers()->createMany([
            ['answer_text' => 'Lyon', 'is_correct' => false],
            ['answer_text' => 'Marseille', 'is_correct' => false],
            ['answer_text' => 'Paris', 'is_correct' => true],
            ['answer_text' => 'Bordeaux', 'is_correct' => false],
        ]);

        // --- Question 3 : Cinéma ---
        $q3 = Question::create([
            'question_text' => 'Quel film a remporté l\'Oscar du meilleur film en 1998 ?',
            'user_id' => 1,
            'tag' => 'Cinéma'
        ]);

        $q3->answers()->createMany([
            ['answer_text' => 'Titanic', 'is_correct' => true],
            ['answer_text' => 'Avatar', 'is_correct' => false],
            ['answer_text' => 'Star Wars', 'is_correct' => false],
            ['answer_text' => 'Gladiator', 'is_correct' => false],
        ]);
        
        // --- Question 4 : Tech ---
        $q4 = Question::create([
            'question_text' => 'Quel langage est utilisé par Laravel ?',
            'user_id' => 1,
            'tag' => 'Tech'
        ]);

        $q4->answers()->createMany([
            ['answer_text' => 'Python', 'is_correct' => false],
            ['answer_text' => 'PHP', 'is_correct' => true],
            ['answer_text' => 'Java', 'is_correct' => false],
            ['answer_text' => 'Ruby', 'is_correct' => false],
        ]);

        // --- Question 5 : Sport ---
        $q5 = Question::create([
            'question_text' => 'Combien de joueurs y a-t-il dans une équipe de football ?',
            'user_id' => 1,
            'tag' => 'Sport'
        ]);

        $q5->answers()->createMany([
            ['answer_text' => '9', 'is_correct' => false],
            ['answer_text' => '10', 'is_correct' => false],
            ['answer_text' => '11', 'is_correct' => true],
            ['answer_text' => '12', 'is_correct' => false],
        ]);

        $q6 = Question::create([
            'question_text' => 'Quelle planète est la plus proche du Soleil ?',
            'user_id' => 1,
            'tag' => 'Science'
        ]);

        $q6->answers()->createMany([
            ['answer_text' => 'Vénus', 'is_correct' => false],
            ['answer_text' => 'Terre', 'is_correct' => false],
            ['answer_text' => 'Mercure', 'is_correct' => true],
            ['answer_text' => 'Mars', 'is_correct' => false],
        ]);

        $q7 = Question::create([
            'question_text' => 'Qui a peint la Joconde ?',
            'user_id' => 1,
            'tag' => 'Art'
        ]);
        $q7->answers()->createMany([
            ['answer_text' => 'Vincent van Gogh', 'is_correct' => false],
            ['answer_text' => 'Pablo Picasso', 'is_correct' => false],
            ['answer_text' => 'Leonard de Vinci', 'is_correct' => true],
            ['answer_text' => 'Claude Monet', 'is_correct' => false],
        ]);

        $q8 = Question::create([
            'question_text' => 'Quelle est la langue la plus parlée au monde ?',
            'user_id' => 1,
            'tag' => 'Langue'
        ]);
        $q8->answers()->createMany([
            ['answer_text' => 'Anglais', 'is_correct' => false],
            ['answer_text' => 'Mandarin', 'is_correct' => true],
            ['answer_text' => 'Espagnol', 'is_correct' => false],
            ['answer_text' => 'Hindi', 'is_correct' => false],
        ]);

        $q9 = Question::create([
            'question_text' => 'Quel est l\'élément chimique dont le symbole est O ?',
            'user_id' => 1,
            'tag' => 'Science'
        ]);
        $q9->answers()->createMany([
            ['answer_text' => 'Or', 'is_correct' => false],
            ['answer_text' => 'Oxygène', 'is_correct' => true],
            ['answer_text' => 'Osmium', 'is_correct' => false],
            ['answer_text' => 'Oganesson', 'is_correct' => false],
        ]);

        $q10 = Question::create([
            'question_text' => 'En quelle année l\'homme a-t-il marché sur la Lune pour la première fois ?',
            'user_id' => 1,
            'tag' => 'Science'
        ]);
        $q10->answers()->createMany([
            ['answer_text' => '1965', 'is_correct' => false],
            ['answer_text' => '1969', 'is_correct' => true],
            ['answer_text' => '1972', 'is_correct' => false],
            ['answer_text' => '1959', 'is_correct' => false],
        ]);
    }
}
