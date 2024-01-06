<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfiles()
    {
        $users = User::first();
        return view("navbar.profiles.profile", compact('users'));
    }

    public function getEditProfiles(String $id)
    {
        $users = User::find($id);
        return view("navbar.profiles.editprofile", compact('users'));
    }

    public function postEditProfiles(Request $request, String $id)
    {
        $this->validate($request, [
            "full_name" => "required",
            "email" => "required|email:rfc,dns",
            "address" => "required",
            "phone" => "required"
        ],[
            "full_name.required" => "Họ tên không được bỏ trống",
            "email.required" => "Email không được bỏ trống",
            "email.email" => "Email chưa đúng định dạng",
            "address.required" => "Địa chỉ không được bỏ trống",
            "phone.required" => "Số điện thoại không được bỏ trống"
        ]);

        $users = User::findOrFail($id);
        $users->full_name = $request->full_name;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->save();
        return redirect()->route('user.Profiles')->with('message', 'Success1');
        // $full_name = $request->full_name;
        // $email = $request->email;
        // $address = $request->address;
        // $phone

        // DB::table('users')->where('id', $id)->update([
        //     'full_name' => $full_name,
        //     'email' => $email,
        //     'address' => $address
        // ]);
    }
}
