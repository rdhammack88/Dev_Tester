<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Return Home Page View
    public function index() {
        $title = 'Dev Tester';
        return view('pages/index')->with('title', $title);
    }

    // Return Quiz Choice View
    public function quizChoice() {
        $title = 'Dev Tester';
        return view('pages/choice')->with('title', $title);
    }

    // Return Question View
    public function question($route) {
        $title = 'Dev Tester';
        return view('pages/question/'.$route)->with('title', $title);
    }

    // Return Admin View
    public function adminRegister() {
        $title = 'Dev Tester';
        return view('pages/admin/register')->with('title', $title);
    }

    // Return Admin View
    public function adminLogin() {
        $title = 'Dev Tester';
        return view('pages/admin/login')->with('title', $title);
    }

    // Return Admin View
    public function adminLogout() {
        $title = 'Dev Tester';
        return view('pages/admin/logout')->with('title', $title);
    }
}