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



}
