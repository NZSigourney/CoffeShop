<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slide::all();
        return view('adminpages.slidebar.sliders.slider', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpages.slidebar.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = "";
        if($request->hasFile("image")){
            $this->validate($request, [
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],[
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]);

            $file = $request->file('image');
            $img = $file->getClientOriginalName();
            $destinationPath=public_path('assets/images/sliders'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public

            // Kiểm tra xem hình ảnh đã tồn tại hay chưa
            if (file_exists($destinationPath . '/' . $img)) {
                return redirect('sliders')->with('message', 'Hình ảnh đã tồn tại. Vui lòng chọn hình ảnh khác.');
            }

            $file->move($destinationPath, $img);
        }else{
            $this->validate($request, [
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],[
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]);
        }

        $sliders = new Slide;
        if($img == ''){
            $sliders->image = $img;
        };
        $sliders->image = $img;
        $sliders->save();
        return redirect('sliders')->with('message', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sliders = Slide::findOrFail($id);
        return view('adminpages.slidebar.sliders.edit', ['sliders' => $sliders]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $img = "";
        $sliders = Slide::findOrFail($id);
        if($request->hasFile('image')){
            $this->validate($request, [
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],[
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]);
            $file = $request->file('image');
            $img = $file->getClientOriginalName();
            $destinationPath=public_path('assets/images/sliders'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $img);

            // Đảm bảo xóa hình ảnh cũ nếu có
            if (!empty($sliders->image)) {
                $oldImagePath = public_path('assets/images/sliders/') . $sliders->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }else{
            $this->validate($request, [
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],[
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]);
        }

        $sliders->image = $img;
        $sliders->save();
        return redirect('sliders')->with('message', 'Update thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sliders = Slide::find($id);

        // Đảm bảo sản phẩm tồn tại
        if (!$sliders) {
            return redirect('sliders')->with('message', 'Sản phẩm không tồn tại!');
        }

        DB::delete('delete from slide where id = ?', [$id]);
        // DB::statement("ALTER TABLE slide AUTO_INCREMENT = $id");
        // Lấy giá trị ID tiếp theo
        $nextId = DB::table('slide')->max('id') + 1;

        // Đặt lại AUTO_INCREMENT thành giá trị tiếp theo sau khi xóa
        DB::statement("ALTER TABLE slide AUTO_INCREMENT = $nextId");

        // Image remove

        
        // Xóa hình ảnh cũ nếu có
        if (!empty($sliders->image)) {
            $oldImagePath = public_path('assets/images/sliders/') . $sliders->image;

            // Kiểm tra xem tệp tin tồn tại trước khi xóa
            if (file_exists($oldImagePath)) {
                // Thực hiện xóa tệp tin
                unlink($oldImagePath);
                return redirect('sliders')->with('message', 'Xóa thành công!');
            } else {
                return redirect('sliders')->with('message', 'Hình ảnh không tồn tại!');
            }
        }
        return redirect('sliders')->with('message', 'Xóa thành công!');
    }
}
