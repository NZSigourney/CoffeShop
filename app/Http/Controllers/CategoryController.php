<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\product_type;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     return view('adminpages.slidebar.category.dashboard');
    // }

    // public function listCategory(){
    //     $cates = Category::all();
    //     return view('adminpages.slidebar.category.category', compact('cates'));
    // }

    public function product_type($type){
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type','<>', $type)->paginate(3);
        $loai = product_type::all();
        $loai_sp = product_type::where('id', $type)->first();
        return view('product_type', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }

    // public function header_type_product($type){
    //     $loai_sp = product_type::where('id', $type)->first();
    //     return view('layouts.header', compact('loai_sp'));
    // }

    public function getCateList(){
        $cates = Category::orderBy('created_at', 'DESC')->get();
        return view('adminpages.slidebar.category.category', compact('cates'));
    }
    
    public function getCateAdd() {

        return view('adminpages.slidebar.category.cate_add');
    }
    public function postCateAdd(Request $request)
    {
        $name = '';
        if ($request->hasfile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,gif,jpeg|max: 2048',
                'description' => 'required',
                'name' => 'required|unique:type_products',
            ],[
                'image.mimes' => 'Chỉ chấp nhận file hình ảnh',
                'image.max' => 'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required' => 'Bạn chưa nhập mô tả',
                'name.required' => 'Bạn chưa nhập name',
                'name.unique' => 'Tên sản phẩm đã tồn tại. Vui lòng chọn tên khác.'
            ]);

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('assets/images/category'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            
            // Kiểm tra xem hình ảnh đã tồn tại hay chưa
            if (file_exists($destinationPath . '/' . $name)) {
                return redirect()->route('admin.getCateList')->with('message', 'Hình ảnh đã tồn tại. Vui lòng chọn hình ảnh khác.');
            }
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/category
        } else {
            $this->validate($request, [
                'description' => 'required',
                'name' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048','image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ], [
                    'description.required' => 'Bạn chưa nhập mô tả',
                    'name.required' => 'Bạn chưa nhập name',
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]);
        }
        $category = new Category;
        $category->description = $request->description; 
        $category->name = $request->name;
        $category->image = $name;
        $category->save();
        return redirect()->route('admin.getCateList')->with('success','Thêm danh mục thành công');
    }
    
    public function getCateEdit(string $id) {
         $cate =  Category::find($id);
        return view('adminpages.slidebar.category.cate_edit', compact('cate'));
    }
    
    public function postCateEdit(Request $request, string $id) {
        $imgname = '';
        $category = Category::findOrFail($id);
        if ($request->hasfile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,gif,jpeg|max: 2048',
                'description' => 'required',
                'name' => 'required',               
            ], [
                'image.mimes' => 'Chỉ chấp nhận file hình ảnh',
                'image.max' => 'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required' => 'Bạn chưa nhập mô tả',
                'name.required' => 'Bạn chưa nhập name',
            ]);
            
            $file = $request->file('image');
            $imgname = $file->getClientOriginalName();
            $destinationPath = public_path('assets/images/category'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $imgname); //lưu hình ảnh vào thư mục public/category

            // Đảm bảo xóa hình ảnh cũ nếu có
            if (!empty($category->image)) {
                $oldImagePath = public_path('assets/images/category/') . $category->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,gif,jpeg|max: 2048',
                'description' => 'required',
                'name' => 'required',   
            ], [
                'image.mimes' => 'Chỉ chấp nhận file hình ảnh',
                'image.max' => 'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required' => 'Bạn chưa nhập mô tả',
                'name.required' => 'Bạn chưa nhập name',
            ]);
            $imgname = $category->image;
        }
        $category->description = $request->description;
        $category->name = $request->name;
        $category->image = $imgname;
        $category->save();
       
        // $description = $request->description; 
        // $name = $request->name;
        // $image = $request->image;
       
        // DB::table('type_products')->where('id', $id)->update([
        //     'description' =>   $description ,
        //     'name' =>  $name,
        //     'image'=> $image,           
        // ]);
        
        // return redirect(route('adminpages.slidebar.category.getCateList'))->with('success','Cập nhật sản phẩm thành công!');
        return redirect()->route('admin.getCateList')->with('success','Cập nhật sản phẩm thành công!');
       
       
        // return redirect()->back()->with('success','Sửa danh mục thành công');
    }

//
    public function getCateDelete( string $id)
    {
        // //
        // Category::find($id)->delete();
        // // $id->delete();
        // return redirect()->back()->with('success','Xóa danh mục thành công');

        $category = Category::find($id);

        // Đảm bảo sản phẩm tồn tại
        if (!$category) {
            return redirect()->route('admin.getCateList')->with('message', 'Sản phẩm không tồn tại!');
        }

        // Lấy giá trị ID tiếp theo
        // $nextId = DB::table('type_products')->max('id') + 1;

        // // Đặt lại AUTO_INCREMENT thành giá trị tiếp theo sau khi xóa
        // DB::statement("ALTER TABLE type_products AUTO_INCREMENT = $nextId");

        // Kiểm tra xem có sản phẩm nào liên quan không
        $relatedProducts = Product::where('id_type', $id)->get();

        // Nếu có sản phẩm liên quan, xóa chúng trước
        foreach ($relatedProducts as $product) {
            // Xóa hình ảnh cũ nếu có
            if (!empty($product->image)) {
                $oldProductImagePath = public_path('assets/images/category/') . $product->image;

                // Kiểm tra xem tệp tin tồn tại trước khi xóa
                if (file_exists($oldProductImagePath)) {
                    unlink($oldProductImagePath);
                }
            }

            $product->delete();
        }

        // Tiếp tục xóa category
        // Xóa hình ảnh cũ nếu có
        if (!empty($category->image)) {
            $oldCategoryImagePath = public_path('assets/images/category/') . $category->image;

            // Kiểm tra xem tệp tin tồn tại trước khi xóa
            if (file_exists($oldCategoryImagePath)) {
                unlink($oldCategoryImagePath);
            }
        }

        // Xóa category
        $category->delete();
        return redirect()->route('admin.getCateList')->with('message', 'Xóa thành công!');
    }
}