<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Answer;

class ScoreService
{
    public function scoreUpdate($answerId, $score){
        $answer = Answer::find($answerId);

        if ($answer && $answer->is_correct) {
            $score->increment('score');
            return true;
        }
        return false;
    }


}