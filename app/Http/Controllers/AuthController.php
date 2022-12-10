<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //auth
    public function loginPage()
    {
        return view('login');
    }
    public function RegisterPage()
    {
        return view('register');
    }
}
