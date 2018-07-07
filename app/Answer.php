<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = 'choices';

    public function getChoices($id) {
        $answer = new Answer;
        $answers = $answer::where('question_number', '=', $id)->get();
        return $answers;
    }

}
