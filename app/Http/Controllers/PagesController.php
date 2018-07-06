<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

    private $title = 'Dev Tester';

    // Return Home Page View
    public function index() {
        $title = 'Dev Tester';
        Session::forget('category');
        Session::forget('question.user_answers');
        Session::forget('question.previous_questions');
        Session::forget('question.correct_answers');
        return view('pages/index')->with('title',  $this->title);
    }

    // Return About Page View
    public function about() {
        // $title = 'Dev Tester';
        return view('pages/about')->with('tile', $this->title);
    }

    // Return Quiz Choice View
    public function quizChoice() {
        // $title = 'Dev Tester';
        return view('pages/choice')->with('title',  $this->title);
    }

    // Return Question View
    public function question($route) {
        // $title = 'Dev Tester';
        return view('pages/question/'.$route)->with('title',  $this->title);
    }

    // Return Admin View
    public function adminRegister() {
        // $title = 'Dev Tester';
        return view('auth/register');
        // return view('pages/admin/register')->with('title', $title);
    }

    // Return Admin View
    public function adminLogin() {
        // $title = 'Dev Tester';
        return view('auth/login');
        // return view('pages/admin/login')->with('title', $title);
    }

    // Return Admin View
    public function adminLogout() {
        // $title = 'Dev Tester';
        return view('pages/admin/logout')->with('title',  $this->title);
    }
}
