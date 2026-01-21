<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $tag;
    protected $question_text;
    protected $answers = [];
    protected $correct_answer;
    protected $user_id;

    protected $fillable = [
        'tag', 
        'question_text', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Relation avec l'utilisateur
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }


}

