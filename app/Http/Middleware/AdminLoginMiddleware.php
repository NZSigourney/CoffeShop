<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user = Auth::user()->level;
            if($user == 1 || $user == 2){
                return $next($request);
            } else {
                return redirect('/');
            }
        }else{
            return redirect('/dangnhap');
        }

        // $role = Auth()->user()->level;
        // if($role == '1'){
        //     return $next($request);
        // } elseif($role == 2 || $role == 3) {
        //     return redirect("dashboard");
        // }
    }
}
