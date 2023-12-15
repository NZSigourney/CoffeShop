<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('adminpages.dashboard');
    }

    // public function getUserEmail(){
    //     $user = Auth::user();
    //     $email = $user->email;
    //     return view('adminpages.layouts.slidebarleft', compact('email'));
    // }
    
}
