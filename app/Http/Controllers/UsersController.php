<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function getUsers(){
        if(Auth::id()){
            $Users = User::get();
            // dd($User);
            return view('dashboard', compact('Users')); 
        }
        return view('auth.login');
      
    }
}
