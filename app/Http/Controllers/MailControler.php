<?php

namespace App\Http\Controllers;

use App\Mail\SMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailControler extends Controller
{
    public function getInputEmail(){
        return view('emails.input-email');
    }

    public function postinputEmail(Request $req) {
        // $email = $req->email;
        $inp = $req->input('txtEmail');
        //validate

        // kiểm tra có user có email như vậy không
        // $user = User::where('email',$email)->get();
        // dd($user);
        // if($user->count() != 0){
        //     gửi mật khẩu reset tới email
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456'
            ];
            Mail::to($req->user())->cc($inp)->bcc($inp)->send(new SMail($sentData));
            // Mail::to($req->user())->cc("longthaithien98@gmail.com")->bcc("longthaithien98@gmail.com")->send(new SMail($sentData));
            Session::flash('message', 'Send email successfully!');
           
            return view('navbar.login');  //về lại trang đăng nhập của khách
        // }
        // else {
        //     return redirect()->route('getEmail')->with('message','Your email is not right');
        // }
    }//hết postInputEmail
}
