<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // Set default DB table
    protected $table;// = 'questions';

    // public function questionCount($request) { //Request $request
    //     return $this::where('question_category', '=', $request)->get()->count();
    //     // return $request;
    // }

    // public function index() {
    //     return view('pages/question');
    // }

    public function __construct($table = 'questions') {
        $this->table = $table;
    }

    public function __set($table, $val) {
        $this->$table = $val;
    }

    public static function showQuestion($category) {
        // echo 'Working in Question Model and Controller with param ' . $category;

        $question = new Question;

        $question_info = array();
        $question_info['question'] = $question::inRandomOrder()->where('question_category', '=', $category)->first();

        // $question_info['table1'] = $question->table;


        // $question_info['table2'] = $question->table;

        $question_info['question_id'] = $question_info['question']['id'];

        // $question->table = 'choices';

        $answers = new Answer;
        $question_info['answers'] = $answers::inRandomOrder()->where('question_number', '=', $question_info['question']['id'])->get();
        // $question->table = 'questions';

        // $question_info['table3'] = $question->table;

        return view('pages/question')->with($question_info);
    }

}
