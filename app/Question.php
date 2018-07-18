<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Question extends Model
{
    // Set default DB table
    protected $table = 'questions';

    // public function questionCount($request) { //Request $request
    //     return $this::where('question_category', '=', $request)->get()->count();
    //     // return $request;
    // }

    // public function index() {
    //     return view('pages/question');
    // }

    // public function __construct($table = 'questions') {
    //     $this->table = $table;
    // }
    //
    // public function __set($table, $val) {
    //     $this->$table = $val;
    // }

    /*
     * Return the Question View
     * @param string $category === Test Type Category
     * @param int $number_of_questions === Total number of questions to display to the user.
     */
    public static function showQuestion($category, $number_of_questions, $num) {
        // echo 'Working in Question Model and Controller with param ' . $category;


        $question = new Question;
        $answers = new Answer;

        $question_info = array();

        // if(isset($_POST['choice'])) {
        //     $question_info['recent_choice'] = $_POST['choice'];
        // }


        if(Session::get('question.previous_questions')) {
            $question_info['recent_questions'] = Session::get('question.previous_questions');
        } else {
            $question_info['recent_questions'] = array();
        }


        // $question_info['question_number']   = isset($question_info['question_number']) ? $question_info['question_number']++ : 1;
        $question_info['question_number']   = $num;
        $question_info['question_count']    = $number_of_questions;
        $question_info['question']          = $question::inRandomOrder()
                                                    ->where('question_category', '=', $category)
                                                    ->whereNotIn('id', $question_info['recent_questions'])
                                                    ->first();
        $question_info['answers']           = $answers::inRandomOrder()
                                                    ->where('question_number', '=', $question_info['question']['id'])
                                                    ->get();

        $question_info['correct_answer']    = array_flatten($answers::where([
                                            ['question_number', $question_info['question']['id']],
                                            ['is_correct', 1]
                                            ])->pluck('id')->toArray());
        // $question_info['correct_answer']    = array_dot($question_info['correct_answer']);
        // select('id')->
        // array_flatten(array_flatten(

                                            //->get()->pluck('id');
                                            // $answers::where([
                                            // ['is_correct', 1],
                                            // ['question_number', $question_info['question']['id']]
                                            // ])->pluck('id');
        // where('is_correct', 1)->where('question_number', $question_info['question']['id'])->first();

        if(isset($_POST['choice'])) {
            $question_info['recent_choice'] = $_POST['choice'];
            Session::push('question.user_answers', $_POST['choice']);
            // if($_Post)
        } else {
            $question_info['recent_choice'] = '';
        }

        Session::push('question.previous_questions', $question_info['question']['id']);
        Session::push('question.correct_answers', $question_info['correct_answer'][0]);

        // $question->table = 'choices';
        // $question->table = 'questions';
        // $question_info['table1'] = $question->table;
        // $question_info['table2'] = $question->table;
        // $question_info['table3'] = $question->table;
        // $question_info['question_id']       = $question_info['question']['id'];

        return view('pages/question')->with($question_info);//->with(Session::all());
        // return redirect("/question/". $question_info['question']['question_category']."/1");
    }

    /*
     * Return Final Page to current test taker
     * @params session arrays
     * - $test_qeustions === Questions test taker answered
     * - $test_correct_answers === The answers that matched the questions that were answered
     * - $user_answers === The user entered answers
     */
    public static function quizComplete($test_qeustions, $test_correct_answers, $test_user_answers) {
        $questions = Question::whereIn('id', $test_qeustions)->get();
        $correct_answers = Answer::whereIn('id', $test_correct_answers)->get();
        $user_answers = Answer::whereIn('id', $test_user_answers)->get();

        return view('pages/quizFinal')->
            with('questions', $questions)->
            with('correct_answers', $correct_answers)->
            with('user_answers', $user_answers);
    }

    /*
     * If current Admin User has any questions submitted,
     * pull the questions from the db and display to Admin User.
     * If no questions posted by current Admin, display appropriately.
     */
    public function getAllQuestions($user_id) {
        $questions = Question::where('added_by', '=', $user_id)->paginate(10);

        if($questions) {
            return $questions;
        } else {
            return 'You do not have any questions';
        }
    }

    /*
     * Add question to DB for current Admin User
     * @params $request === $_POST variables
     */
    public function addQuestion($request) {
        $user_id = auth()->user()->id;
        $question = new Question;
        $question->question = $request->input('question');
        $question->question_category = $request->input('question_category');
        $question->added_by = $user_id; // auth()->user()->id;
        $question->save();


        ////////////////////////

        // return dd($question->id);

        // $answer->question_number = $request
        // foreach ($variable as $key => $value) {
        //     // code...
        // }

        // return auth()->user()->id;

        // return 'Record inserted';
        /////////////////////////
        $last_inserted_id = $question->id; //DB::table()->insertGetIddd($question->id);
        // return $last_inserted_id;
        // $answer
        for ($i=1; $i < 6; $i++) {
            $answer = new Answer;
            if ($request->input('choice#'.$i) != '') {
                $answer->answers = $request->input('choice#'.$i);
            } else {
                break;
            }
            $answer->question_number = $last_inserted_id;//dd($question->id);
            $answer->added_by = $user_id; // auth()->user()->id;
            if ($i == $request->input('correct_choice')) {
                $answer->is_correct = 1;
                $answer->correct_explanation = $request->input('correct_explanation');
                $answer->resources = $request->input('resources');
            } else {
                $answer->is_correct = 0;
            }

            $answer->save();
        }

        return redirect('/admin/dashboard');
    }

    /*
     * Return the question info to edit for current Admin User
     * @param integer $id === db id column for questions table
     */
    public function editQuestion($id) {
        $question = new Question;
        $result = $question->find($id);//where('id', '=', $id)->get();

        return $result;
        // $question_info = array();
        // $question_info['question_id'] = '';
    }

    /*
     * Return the new question info to update for current Admin User
     * @params $request && $id
     * - $request === $_POST variables
     * - integer $id === db id column for questions table 
     */
    public function updateQuestion($request, $id) {
        $question = Question::find($id);
        $answer = Answer::where('question_number', '=', $id);
        $question->question = $request->input('question');
        $question->question_category = $request->input('question_category');
        $question->added_by = auth()->user()->id;
        $question->save();
        // $answer->added_by = $request->input('choice');
        // $answer-> = $request->input('correct_choice');
        // $answer-> = $request->input('correct_reason');


        // question
        // question_category
        // choice
        // correct_choice
        // correct_reason


        // return $question;
        return redirect('/admin/dashboard');
    }


}
