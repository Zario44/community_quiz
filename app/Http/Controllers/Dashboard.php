<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ScoreRepository;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard',
        ['bestScores' => (new ScoreRepository())->bestScores()]);
    }
}
