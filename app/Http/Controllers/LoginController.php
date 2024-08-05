<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    //
    public function handlelogin(LoginRequest $request) 
    {
        // $request->validate([
        //     'username' => ['required','email'],
        //     'password' => 'required'
        // ],[
        //     'username.required' => 'Bạn phải nhập username!!!'
        // ]);
        return $request;

    }
}
