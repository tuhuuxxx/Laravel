<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addMeController extends Controller
{
    public function addMe ($a,$b) {
        $tong = $a + $b;
        return "Ban da duoc add : $tong";
    }
    public function getView() {
        $data['user'] = ['dang huu tu','nguyen van a'];
        return view('hello',$data);
    }
}
