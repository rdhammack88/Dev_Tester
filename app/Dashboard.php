<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dashboard extends Model
{
    //

    public static function index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('/pages/admin/dashboard')->with('user_id', $user->id);//->with('questions', $user->questions);
    }
}
