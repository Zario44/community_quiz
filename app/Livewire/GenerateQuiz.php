<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Score;
use App\Services\ScoreService;
use App\Repositories\ScoreRepository;

class GenerateQuiz extends Component
{
    public $questions = [];
    public $currentIndex = 0;
    
    public $quizId; 

    public $localScore = 0;

    public function mount(ScoreRepository $scoreRepository) 
    {
        // 1. Création propre
        // Assure-toi d'avoir mis $fillable dans le modèle Score !
        $newScore = $scoreRepository->createScore(auth()->id());


        // 2. On stocke l'ID dans la variable publique
        $this->quizId = $newScore->id;
        
        // 3. Chargement des questions
        $this->questions = Question::with('answers')
            ->inRandomOrder()
            ->limit(10)
            ->get();
    }

    public function selectAnswer(ScoreService $scoreService, $answerId)
    {
        // 1. On récupère le score grâce à l'ID stocké
        $scoreEntry = Score::find($this->quizId);

        // 2. On vérifie et on met à jour
        if ($scoreEntry) {
            // Note : Modifie ton service pour qu'il renvoie true/false
            // C'est plus simple pour gérer l'affichage
            $isCorrect = $scoreService->scoreUpdate($answerId, $scoreEntry);
            
            if ($isCorrect) {
                $this->localScore++; // +1 à l'écran tout de suite
            }
        }

        // 3. Question suivante
        $this->currentIndex++;
    }

    public function ticketQuestion(){
        $currentQuestion = $this->questions[$this->currentIndex]->id;
        return redirect()->route('ticket.question', [
            'questionId' => $currentQuestion
        ]); 
    }

    public function render()
    {
        return view('quiz.play', [
            // On affiche la variable locale, c'est instantané
            'finalScore' => $this->localScore 
        ]);
    }
}