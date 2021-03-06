<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Session\SessionManager;
// use Illuminate\Session\SessionServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Question;

class QuestionsController extends Controller
{
    /**
     *
     *
     *
     */
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
        // $dashboard = new Dashboard;
        // return $dashboard->addQuestion();
        return view('pages/admin/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $question = new Question;

        $this->validate($request, [
            'question' => 'required',
            'question_category' => 'required',
            'choice#1' => 'required',
            'choice#2' => 'required',
            'correct_choice' => 'required'
        ]);

        return $question->addQuestion($request);
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
        $question = new Question;

        $this->validate($request, [
            'question' => 'required',
            'question_category' => 'required',
            'choice#1' => 'required',
            'choice#2' => 'required',
            'correct_choice' => 'required'
        ]);

        return $question->updateQuestion($request, $id);
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

    /**
     * Return Question Models show question method.
     * Set Session Category.
     * Validate test choices, redirect if forced without set
     * @param $cat, $num, $request
     * - $cat === Test Select Category
     * - $num === Number of questions test taker has chosen to take
     * - $request === 
     */
    public function showQuestion($cat, $num, Request $request) {
        //

        if(isset($_POST['quit'])) {
            return redirect('/quiz-choice');
        }

        // if(isset($_POST['submitQuiz'])) {
        //     // return redirect('/quizFinal');
        //     return $this->quizComplete();
        // }

        // $num++;
        if(isset($_POST['category']) && $_POST['category'] !== 'none' && isset($_POST['number_of_questions'])) {
            $category = $_POST['category'];
            $number_of_questions = $_POST['number_of_questions'];
            // $request->session()->put('category', $category);
            Session::put('category', $category);
            // session(['category' => $category]);
        }
        if(!isset($_POST['category'])
            || !isset($_POST['number_of_questions'])
            || $_POST['category'] === 'none') {
                $error = 'Please fill out all fields';
                return redirect('/quiz-choice')->with('error', $error);
        }

        // if(isset($_POST['choice'])) {
        //     Session::put('user.answers');
        //     Session::push('user.answers', $_POST['choice']);
        // }
        return Question::showQuestion($category, $number_of_questions, $num++);
    }

    /**
     * Set Session Variables for:
     * - questions taken by user
     * - users answers
     * - correct answers to questions taken
     * Return Question Model quizComplete method
     */
    public function quizComplete() {
        // echo 'Completed Quiz';
        $test_qeustions         = Session::get('question.previous_questions');
        // session('question.previous_questions')
        $test_correct_answers   = Session::get('question.correct_answers');
        // session('question.correct_answers')
        $test_user_answers      = Session::get('question.user_answers');
        // session('question.user_answers')

        return Question::quizComplete($test_qeustions, $test_correct_answers, $test_user_answers);

        // return view('pages/quizFinal');
    }

    /**
    *
    * TEST METHOD
    * - NOT BEING USED
    *
    */
    public function confirmChoice() {
        // Session::push('user_answers', $_POST['choice']);
    }

    /**
    *
    * TEST METHOD
    * - NOT BEING USED
    *
    */
    public function returnTest($category, $number) {

        if(isset($_POST['category']) && $_POST['category'] !== 'none') {
            $category = $_POST['category'];
        }

        if(isset($_GET['category']) && $_GET['category'] !== 'none') {
            $category = $_GET['category'];
        }
        return redirect("/question/$category/1");
    }

    /**
     *
     *
     *
     */
}
