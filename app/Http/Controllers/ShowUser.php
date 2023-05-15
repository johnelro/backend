<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class ShowUser extends Controller
{
    public function showuser()
    {
        $user = user::all();
        return view('showuser', ['users' => $user]);

    }
}
