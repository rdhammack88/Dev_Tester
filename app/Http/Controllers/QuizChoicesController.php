<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizChoice;
use App\Question;
use DB;

class QuizChoicesController extends Controller
{
    //
    // protected $table = 'questions';
    //scopeQuizChoice

    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'quiz-choice', 'question']]);
    }

    public function index() {
        // return DB::select('SELECT ')
        // $choices = QuizChoice::all();
        // return $choices;

        // $choices = QuizChoice->quizChoice();

        // return 'Choice Page!';
        // return $choices;

        // $choices = QuizChoice::select('question_category')->get();
        //

        $error = '';
        $quizChoice = new QuizChoice;
        $choices = $quizChoice->showQuizChoice();
        return view('pages/choice')->with('choices', $choices);//->with('error', $error);
    }

    public function showQuestion()
    {
        //

        if(isset($_POST['category']) && $_POST['category'] !== 'none') {
            $category = $_POST['category'];
        }
        if(!isset($_POST['category'])
            || !isset($_POST['number_of_questions'])
            || $_POST['category'] === 'none') {
                $error = 'Please fill out all fields';
                return redirect('/quiz-choice')->with('error', $error);
        }
        return Question::showQuestion($category);
    }
}
