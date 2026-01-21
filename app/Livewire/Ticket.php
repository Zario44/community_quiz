<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Question;

class Ticket extends Component{
    public $questionId = null;
    public $question;

    public function mount(){
        $this->questionId = request('questionId');
        $this->question = Question::find($this->questionId);
    }

    public function render(){
        return view('ticket.question_ticket');
    }

}