<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $products_count = Product::count();
        $bill_count = Bill::count();
        $billdetailed_count = BillDetail::count();
        $user_count = User::count();
        return view('adminpages.dashboard', compact('products_count', 'bill_count', 'billdetailed_count', 'user_count'));
    }

    // public function getUserEmail(){
    //     $user = Auth::user();
    //     $email = $user->email;
    //     return view('adminpages.layouts.slidebarleft', compact('email'));
    // }
    
}
