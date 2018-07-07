<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dashboard;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('/pages/admin/dashboard');
        return Dashboard::index();
    }

    public function addQuestion() {
        $dashboard = new Dashboard;
        return $dashboard->addQuestion();
    }

    public function editQuestion($id) {
        $dashboard = new Dashboard;
        return $dashboard->editQuestion($id);
    }
}
