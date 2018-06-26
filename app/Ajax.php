<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ajax extends Model
{
    protected $table;
    //
    public function __construct($table) {
        $this->table = $table;
    }

    // public function choiceQuestionCount() {
    //
    //     return $this::all();
    // }

    public function questionCount($request) { //Request $request
        return $this::where('question_category', '=', $request)->get()->count();
        // return $request;
    }

}
