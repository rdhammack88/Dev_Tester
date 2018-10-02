<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dashboard extends Model
{
    /*
     * Return Admin View 
     */
    public static function index() {
        $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // return view('/pages/admin/dashboard')->with('user_id', $user->id);//->with('questions', $user->questions);
        return Dashboard::showAllUserQuestions($user_id);
    }

    /*
     * Return all questions added by current user
     * @param integer $id
     */
    public static function showAllUserQuestions($id) {
        $question        = new Question;
        $answer          = new Answer;
        $user            = new User;
        $total_users     = $user->getTotalUsers();
        // $user_questions = Question::find($id);
        $questions = $question->getAllQuestions($id);
        $total_user_questions = $question->getTotalUserQuestions($id);
        $answers   = $answer->userQuestionCount($id);

        return view('/pages/admin/dashboard')->
            with('questions', $questions)->
            with('total_user_questions', $total_user_questions)->
            with('answers', $answers)->
            with('total_users', $total_users);
    }

    /*
     * Return Add Question View for current Admin User
     */
    public function addQuestion() {
        return view('pages/admin/add');
    }

    /*
     * Update Question for current Admin User
     * @param integer $id
     */
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
