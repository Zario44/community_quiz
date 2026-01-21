<?php

namespace App\Repositories;

use App\Models\Score;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ScoreRepository
{
    public function createScore(int $userId): Score
    {
        return Score::create([
            'user_id' => $userId,
            'score' => 0
        ]);
    }

    public function bestScores()
    {
        // Clé du cache : 'leaderboard_top_10'
        // Durée : 300 secondes (5 minutes)
        
        return Cache::remember('leaderboard_top_10', 300, function () {

            //Ce code ne s'exécutera qu'une fois toutes les 5 minutes !
            return DB::table('scores')
                ->join('users', 'scores.user_id', '=', 'users.id')
                ->select('users.name', 'scores.score')
                ->orderByDesc('scores.score')
                ->orderBy('scores.created_at', 'asc')
                ->limit(10)
                ->get();
        });
    }
}

