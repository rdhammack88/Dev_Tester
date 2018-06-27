<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Session\SessionManager;
// use Illuminate\Session\SessionServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Question;

class QuestionsController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'quiz-choice', 'question']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null, $num = null) {
        // echo 'Working in Question Model and Controller';

        $courses = array('PHP', 'CSS', 'HTML', 'SQL', 'JAVASCRIPT', 'JQUERY', 'BOOTSTRAP', 'SASS');
        if(in_array($category, $courses)) {
            return $this->returnTest($category, $num);
        }


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
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() {
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
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function showQuestion($cat, $num, Request $request) {
        //

        if(isset($_POST['quit'])) {
            return redirect('/quiz-choice');
        }

        // $num++;
        if(isset($_POST['category']) && $_POST['category'] !== 'none') {
            $category = $_POST['category'];
            $number_of_questions = $_POST['number_of_questions'];
            $request->session()->put('category', $category);
            // Session::put('category', $category);
            // session(['category' => $category]);
        }
        if(!isset($_POST['category'])
            || !isset($_POST['number_of_questions'])
            || $_POST['category'] === 'none') {
                $error = 'Please fill out all fields';
                return redirect('/quiz-choice')->with('error', $error);
        }
        return Question::showQuestion($category, $number_of_questions, $num++);
    }

    public function returnTest($category, $number) {

        if(isset($_POST['category']) && $_POST['category'] !== 'none') {
            $category = $_POST['category'];
        }

        if(isset($_GET['category']) && $_GET['category'] !== 'none') {
            $category = $_GET['category'];
        }
        return redirect("/question/$category/1");
    }
}
