<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chkLoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return view('layouts.app');
        } else {
            return view('auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // return $login;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin');
            // return Auth::user()->role;
        } else {
            return redirect()->route('login');
        }

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

}
