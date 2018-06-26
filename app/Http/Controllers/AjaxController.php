<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ajax;
use App\Question;

class AjaxController extends Controller
{

    public function index() {
        echo 'Working from AjaxController';
    }

    //
    public function questionCount($request) { //Request $request
        // $table = 'admin_users';
        // $ajax = new Ajax($table);
        // $data = $ajax->choiceQuestionCount();

        // $question_category = new Question;
        // $question = new Question;
        $question = new Ajax('questions');
        // $questions = $question->questionCount($request);
        // return $questions;
        return $question->questionCount($request);
        // $question->questionCount($request->input('test_category'));
        // $questions = $request;// $_GET['route']; //$request->input('test_category');
        // return view('pages/question')->with('questions', $questions);

        // return $request;
        // $data = 'Working from Ajax Controller';

        // return $question_category->question_count($request);

        // $question_cat = $question_category->question_count($request);
        // return $question_cat;
    }
}
