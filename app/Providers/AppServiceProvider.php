<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\product_type;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //chia sẻ biến Session('cart'),.. cho các view header.blade.php và checkout.php
        View::composer(['layouts.header','checkout'],function($view){
            if(Session('cart')){
                $oldCart= Session::get('cart'); //session cart được tạo trong method addToCart của PageController
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'productCarts'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
            $loai_sp = product_type::all();
            $view->with('loai_sp',$loai_sp);
        });
    }
}
