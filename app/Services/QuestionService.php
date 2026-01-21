<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class QuestionService
{
    /**
     * Crée ou met à jour une question et ses réponses
     */
    public function saveQuestion(array $data, ?int $questionId = null, int $userId): Question
    {
        // DB::transaction = Sécurité. Si une ligne plante, TOUT est annulé.
        return DB::transaction(function () use ($data, $questionId, $userId) {
            
            // 1. On sauvegarde la Question
            $question = Question::updateOrCreate(
                ['id' => $questionId],
                [
                    'tag'           => $data['tag'],
                    'question_text' => $data['question_text'],
                    'user_id'       => $userId,
                ]
            );

            // 2. On gère les Réponses (Nettoyage + Recréation)
            // C'est ici qu'on met la logique métier un peu "lourde"
            $question->answers()->delete();

            foreach ($data['answers'] as $index => $text) {
                $question->answers()->create([
                    'answer_text' => $text,
                    'is_correct'  => ($data['correct_answer'] == $index),
                ]);
            }

            return $question;
        });
    }

    public function deleteQuestion(int $questionId, int $userId): bool
    {
        $question = Question::find($questionId);
        $user = User::find($userId);
        // On vérifie si la question existe ET si c'est bien celle de l'utilisateur
        if ($question && ($question->user_id === $userId || $user->is_admin)) {
            return $question->delete(); // Renvoie true si supprimé
        }

        return false; // Renvoie false si introuvable ou pas le bon propriétaire
    }
} 