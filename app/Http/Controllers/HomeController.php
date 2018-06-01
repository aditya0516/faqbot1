<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Http\Repository\QuestionRepository;


class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->getQuestionsList();
        return view('home', compact('questions'));
    }
    public function admin(Request $req){
        return view('middleware')->withMessage("Admin");
    }
    public function user(Request $req){
        return view('middleware')->withMessage("User");
    }
    public function anonymous(Request $req){
        return view('middleware')->withMessage("Anonymous");
    }
}

