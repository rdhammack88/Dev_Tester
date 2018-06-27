<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public static function showQuestion($category, $number_of_questions) {
        // echo 'Working in Question Model and Controller with param ' . $category;

        $question = new Question;
        $answers = new Answer;

        $question_info                      = array();
        $question_info['question_number']   = isset($question_info['question_number']) ? $question_info['question_number']++ : 1;
        $question_info['question_count']    = $number_of_questions;
        $question_info['question']          = $question::inRandomOrder()
                                                    ->where('question_category', '=', $category)
                                                    ->first();
        $question_info['answers']           = $answers::inRandomOrder()
                                                    ->where('question_number', '=', $question_info['question']['id'])
                                                    ->get();


        // $question->table = 'choices';
        // $question->table = 'questions';
        // $question_info['table1'] = $question->table;
        // $question_info['table2'] = $question->table;
        // $question_info['table3'] = $question->table;
        // $question_info['question_id']       = $question_info['question']['id'];

        return view('pages/question')->with($question_info);
        // return redirect("/question/". $question_info['question']['question_category']."/1");
    }

    public function returnTest() {

        if(isset($_POST['category']) && $_POST['category'] !== 'none') {
            $category = $_POST['category'];
        }

        if(isset($_GET['category']) && $_GET['category'] !== 'none') {
            $category = $_GET['category'];
        }
        return redirect("/question/$category/1");
    }

}
