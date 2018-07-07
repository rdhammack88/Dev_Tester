<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dashboard extends Model
{
    //

    public static function index() {
        $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // return view('/pages/admin/dashboard')->with('user_id', $user->id);//->with('questions', $user->questions);
        return Dashboard::showAllUserQuestions($user_id);
    }

    public static function showAllUserQuestions($id) {
        $question = new Question;
        // $user_questions = Question::find($id);
        $questions = $question->getAllQuestions($id);

        return view('/pages/admin/dashboard')->with('questions', $questions);
    }

    public function addQuestion() {
        return view('pages/admin/add');
    }

    public function editQuestion($id) {
        // return 'Edit question number ' . $id;

        $question = new Question;
        $answers = new Answer;
        $question = $question->editQuestion($id);
        // return $question;
        // return $question->toArray(); //collect(json_decode($question));
        $answer_info = $answers->getChoices($id);

        // $answer_info = collect($answer_info);
        // return $answer_info;

        $question_info = array(
            'question' => $question,
            'answers' => $answer_info
        );
        // return $question;
        return view('pages/admin/edit')->with('question', $question_info);

    }
}
