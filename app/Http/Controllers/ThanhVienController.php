<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ThanhVienRequest;

class ThanhVienController extends Controller
{
    public function getLogIn () 
    {
        return view('login.LogIn');
    }

    public function postLogIn (ThanhVienRequest $request)
    {

    }

    public function checkRequest ()
    {
        return view('welcome');
    }
}
