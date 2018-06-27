<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'quiz-choice', 'question']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Working in Question Model and Controller';
        //
        // $Question = new Question;
        // $questions = $Question->questionCount();
        // return view('pages/question')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //


        // if(isset($_POST['test_category'])) {
        //     $category = $_POST['test_category'];
        // } else {
        //     $category = $_POST['test_category'] = '';
        // }
        // return Question::showQuestion($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showQuestion()
    {
        //

        if(isset($_POST['category']) && $_POST['category'] !== 'none') {
            $category = $_POST['category'];
            $number_of_questions = $_POST['number_of_questions'];
        }
        if(!isset($_POST['category'])
            || !isset($_POST['number_of_questions'])
            || $_POST['category'] === 'none') {
                $error = 'Please fill out all fields';
                return redirect('/quiz-choice')->with('error', $error);
        }
        return Question::showQuestion($category, $number_of_questions);
    }
}
