<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show()
    {
        $users = User::paginate(10);
        return view('Admin.user.index', compact('users'));
    }

    public function store()
    {
        return view('auth.register');
    }
}
