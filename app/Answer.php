<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // protected $table = 'answers'; // 'choices'; choices

    /*
     *
     * 
     */
    public function getChoices($id) {
        $answer = new Answer;
        $answers = $answer::where('question_number', '=', $id)->get();
        return $answers;
    }

    /*
     *
     * 
     */
    public function userQuestionCount($id) {
        $answer = new Answer;
        $answers = $answer::where('added_by', $id)->count();
        return $answers;
    }

}
/*
 *
 * 
 */