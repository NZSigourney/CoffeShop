<?php

namespace App\Http\Controllers;

use App\Mail\SMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $user = User::where('email',$inp)->get();
        // dd($user);
        // if($user->count() != 0){
        //     gửi mật khẩu reset tới email
        $newPassword = str::random(8);
         // Cập nhật mật khẩu mới vào cơ sở dữ liệu
         User::where('email', $inp)->update([
            'password' => Hash::make($newPassword)
        ]);
        $sentData = [
            'title' => 'Mật khẩu mới của bạn là:',
            'body' => $newPassword
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

    public function getChangePwd(){
        return view('navbar.profiles.changepwd');
    }

    public function changePassword(Request $request, string $id)
    {
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|string|min:8|confirmed',
        // ]);

        // $user = Auth::user();

        // if (Hash::check($request->current_password, $user->password)) {
        //     // Tạo một bản sao của user để tránh vấn đề với foreach
        //     $users = User::where('email', $user->email)->get();

        //     foreach ($users as $u) {
        //         $u->update([
        //             'password' => Hash::make($request->new_password),
        //         ]);
        //     }

        //     return redirect()->route('admin.getLogin')->with('message', 'Password changed successfully!');
        // } else {
        //     return redirect()->back()->with('message', 'Current password is incorrect.');
        // }

        // Lấy dữ liệu từ các form
        $user = User::findOrFail($id);
        $oldPassword = $request->repassword;
        $newPassword = $request->password;
        // $newpsw = $request->input('password');

        // Xác minh mật khẩu hiện tại
        if (Hash::check($oldPassword, $user->password)) {
            // Mật khẩu mới không được trùng với mật khẩu hiện tại
            if ($oldPassword !== $newPassword) {
                // Mã hóa mật khẩu mới
                $hashedPassword = Hash::make($newPassword);

                // Cập nhật mật khẩu mới cho người dùng
                $user->update(['password' => $hashedPassword]);
                // $user->update(['repassword' => $newPassword]);
                DB::table('users')->where('id', $id)->update([
                    'repassword' => $newPassword,
                ]);
                Auth::logout();

                // Chuyển hướng đến trang hiển thị thông báo thành công
                return redirect()->route('admin.getLogin')->with('message', 'Mật khẩu đã được cập nhật thành công');
            } else {
                // Chuyển hướng đến trang hiển thị thông báo lỗi
                return redirect()->route('user.getChangePwd')->with('message', 'Mật khẩu mới không được trùng với mật khẩu hiện tại');
            }
        } else {
            return redirect()->route('user.getChangePwd')->with('message', 'Mật khẩu đúng');
        }
    }
}
