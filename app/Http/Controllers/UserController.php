<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('adminpages.slidebar.user.user', ['users' => $users]);
    }

    public function destroy(string $id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect('users')->with('success', 'Xóa sản phẩm thành công');
    }
    
    public function sanpham(){
        $products = Product::where('new', 1)->get();
        return view('adminpages.slidebar.products.product', ['products' => $products]);
    }

    public function getLogin(){
        return view('navbar.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ Email',
            'email.email' => 'Không đúng định dạng @email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải 6 kí tự'
        ]);
        $credentials = array('email' => $request->email, 'password' => $request->password);
        If(Auth::attempt($credentials)){
            $users = Auth::user();
            if($users->level == 1){
                return redirect()->route('admin.dashboard')->with(['flag' => 'alert', 'message' => 'Đăng nhập trang quản trị viên thành công']);
            }else{
                return redirect('/')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
            }
            // return redirect('/')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }

    // public function postLogin(Request $request){
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required|min:6|max:20',
    //     ],[
    //         'email.required' => 'Vui lòng nhập địa chỉ Email',
    //         'email.email' => 'Không đúng định dạng @email',
    //         'password.required' => 'Vui lòng nhập mật khẩu',
    //         'password.min' => 'Mật khẩu ít nhất phải 6 kí tự'
    //     ]);
        
    //     $users = User::where('email', $request->email)->where('password', $request->password)->first();
    //     if($users){
    //         $level = $users->level;
    //         if($level == 1){
    //             return redirect('/')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
    //         }elseif($level == 2 || $level == 3){
    //             return redirect()->route('admin.dashboard')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
    //         }
    //     }else{
    //         return redirect('/dangnhap')->with('error', 'Email hoặc mật khẩu không đúng');
    //     }
    // }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

    // Admin User Area
    public function useraccount(){
        $users = User::all();
        return view('adminpages.slidebar.user.user', ['users' => $users]);
    }

    public function create(){
        return view('adminpages.slidebar.user.createuser');
    }

    public function store(Request $request)
    {
        $name = '';
        if($request->hasFile('image')){
            $this->validate($request, [
                'full_name' => 'required',
                'password' => 'required',
                'email' => 'required|email:rfc,dns',
                'phone' => 'required',
                'address' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'level' => 'required|numeric'
            ],[
                'full_name.required' => 'Bạn chưa nhập tên!',
                'password.required' => 'Bạn chưa nhập mật khẩu!',
                'email.required' => 'Bạn chưa nhập Email!',
                'email.email' => 'Bạn nhập không đúng định dạng Email!',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'address.required' => 'Bạn chưa nhập địa chỉ!',
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                'level.required' => 'Bắt buộc phải nhập số Cấp bậc (Level)!',
                'level.numeric' => 'Phải là số!'
            ]);
            $file = $request->file('image');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images/users'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name);
        }else{
            $this->validate($request, [
                'full_name' => 'required',
                'password' => 'required',
                'email' => 'required|email:rfc,dns',
                'phone' => 'required',
                'address' => 'required',
                // 'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'level' => 'required|numeric'
            ],[
                'full_name.required' => 'Bạn chưa nhập tên!',
                'password.required' => 'Bạn chưa nhập mật khẩu!',
                'email.required' => 'Bạn chưa nhập Email!',
                'email.email' => 'Bạn nhập không đúng định dạng Email!',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'address.required' => 'Bạn chưa nhập địa chỉ!',
                // 'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                // 'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                'level.required' => 'Bắt buộc phải nhập số Cấp bậc (Level)!',
                'level.numeric' => 'Phải là số!'
            ]);
        }
        

        $users = new User;
        $users->full_name = $request->full_name;
        $users->password = $request->password;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->level = $request->level;
        $users->image = $name;
        $users->save();
        return redirect('users')->with('success', 'Thêm mới thành công!');
    }

    public function edit(string $id)
    {
        $users = User::find($id);
        return view('adminpages.slidebar.user.editusers', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            // 'password' => 'required',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'level' => 'required|numeric'
        ],[
            'full_name.required' => 'Bạn chưa nhập tên!',
            // 'password.required' => 'Bạn chưa nhập mật khẩu!',
            'email.required' => 'Bạn chưa nhập Email!',
            'email.email' => 'Bạn nhập không đúng định dạng Email!',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
            'level.required' => 'Bắt buộc phải nhập số Cấp bậc (Level)!',
            'level.numeric' => 'Phải là số!'
        ]);
        
        // $product = Product::find($id);
        $users = User::findOrFail($id);
        $users->full_name = $request->full_name;
        // $users->password = $request->password;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->level = $request->level;
        $users->save();
        return redirect()->route('users.index')->with('success','Bạn đã cập nhật thành công');
    }

    // Khu vuc signin
    public function getSignin(){
        return view('navbar.signup');
    }

    public function postSignin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'full_name'=>'required',
            'repassword'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử  dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]);

        $user=new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->repassword = $req->repassword;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->level = 3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $user->save();
        return redirect()->route('admin.getLogin')->with('success','Tạo tài khoản thành công');
    }

    // public function getProfile()
    // {
    //     $users = User::all();
    //     return view('navbar.profiles.profile', compact('users'));
    // }

    // public function getEditProfile(string $id)
    // {
    //     $users = User::find($id);
    //     return view('navbar.profiles.editprofile', compact('users'));
    // }


    // public function postEditProfile(Request $request, string $id)
    // {
    //     $this->validate($request, [
    //         'full_name' => 'required',
    //         // 'password' => 'required',
    //         'email' => 'required|email:rfc,dns',
    //         'address' => 'required',
    //     ],[
    //         'full_name.required' => 'Bạn chưa nhập tên!',
    //         // 'password.required' => 'Bạn chưa nhập mật khẩu!',
    //         'email.required' => 'Bạn chưa nhập Email!',
    //         'email.email' => 'Bạn nhập không đúng định dạng Email!',
    //         'address.required' => 'Bạn chưa nhập địa chỉ!',
    //     ]);
        
    //     // $product = Product::find($id);
    //     $users = User::findOrFail($id);
    //     $users->full_name = $request->full_name;
    //     // $users->password = $request->password;
    //     $users->email = $request->email;
    //     $users->address = $request->address;
    //     // $users->level = $request->level;
    //     $users->save();

    //     // DB::table('users')->where('id', $id)->update([
    //     //     'full_name' => $users->full_name,
    //     //     'email' => $users->email,
    //     //     'address' => $users->address
    //     // ]);
    //     return redirect()->route('users.index')->with('success','Bạn đã cập nhật thành công');
    // }
}