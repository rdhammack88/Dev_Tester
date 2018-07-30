<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizChoice extends Model
{
    //
    protected $table = 'questions';

    // public function index() {
    //     if(isset($_POST['test_category'])) {
    //         return $_POST['test_category'];
    //     } else {
    //         $_POST['test_category'] = '';
    //     }
    // }

    public function showQuizChoice() {
        // $choices = QuizChoice->quizChoice();
        // return view('pages/choice')->with('choices', $choices);

        // $choices = QuizChoice::all();
        // return $choices;

        // return QuizChoice::select('question_category')->get()
        return QuizChoice::orderBy('question_category')->pluck('question_category')->unique();
        //all(); 
        //->pluck('question_category')->unique();
    }

    // public function showQuestion()
    // {
    //     //
    //
    //     // echo 'working';
    //
    //     // if(isset($_POST['test_category'])) {
    //     //     $category = $_POST['test_category'];
    //     // } else {
    //     //     $category = $_POST['test_category'] = '';
    //     // }
    //     // return Question::showQuestion($category);
    // }
}
