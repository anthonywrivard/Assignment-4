<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('users',['users' => $users]);
    }

    public function addUser(){


    }



    public function getUser($id){
        $user = User::where("id","==",$id)->first();
        return view('view-user',['user' => $user]);
    }


}
