<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\product_type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $products_count = Product::count();

        $bill_count = Bill::count();
        $bill_sum = Bill::sum('total');

        $billdetailed_count = BillDetail::count();
        $user_count = User::where('level' , 3)->count();

        $popular_item_count = Product::where('popular' , 1)->count();
        $product_type_count = product_type::count();
        return view('adminpages.dashboard', compact('products_count', 'bill_count', 'bill_sum', 'billdetailed_count', 'user_count', 'popular_item_count', 'product_type_count'));
    }

    // public function getUserEmail(){
    //     $user = Auth::user();
    //     $email = $user->email;
    //     return view('adminpages.layouts.slidebarleft', compact('email'));
    // }
    
}
