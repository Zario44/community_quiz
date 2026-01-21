<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'subject',
        'message',
        'status',
        'priority'
    ];

    // Relation : Un ticket appartient à un User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : Un ticket peut concerner une Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}