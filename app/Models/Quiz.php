<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Quiz extends Model
{
    public $questions = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
