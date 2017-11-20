<?php

namespace Mascotas\Http\Controllers;

use Illuminate\Http\Request;
use Mascotas\User;

class TestController extends Controller
{
    public function index(){
        return view('students.profile');
    }

    public function show($name, $age){

        return view('students.profile');
    }

    public function datos($user){
        $usr = User::find($user);
        //dd($usr->email);
        return view('students.profile', compact('usr', 'user') );
    }
}
