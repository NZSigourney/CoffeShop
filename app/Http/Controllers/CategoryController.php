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
    //     return view('adminpages.category.dashboard');
    // }

    // public function listCategory(){
    //     $cates = Category::all();
    //     return view('adminpages.category.category', compact('cates'));
    // }

    public function product_type($type){
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type','<>', $type)->paginate(3);
        $loai = product_type::all();
        $loai_sp = product_type::where('id', $type)->first();
        return view('product_type', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }

    public function getCateList(){
        $cates = Category::orderBy('created_at', 'DESC')->get();
        return view('adminpages.category.category', compact('cates'));
    }
    
    public function getCateAdd() {

        return view('adminpages.category.cate_add');
    }
    public function postCateAdd(Request $request)
    {
        $name = '';
        if ($request->hasfile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,gif,jpeg|max: 2048',
                'description' => 'required',
                'name' => 'required',
            ],[
                'image.mimes' => 'Chỉ chấp nhận file hình ảnh',
                'image.max' => 'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required' => 'Bạn chưa nhập mô tả',
                'name.required' => 'Bạn chưa nhập name',
                
            ]);

            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/category'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
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
        return redirect()->back()->with('success','Thêm danh mục thành công');
    }
    
    public function getCateEdit(string $id) {
         $cate =  Category::find($id);
        return view('adminpages.category.cate_edit', compact('cate'));
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
            $imgname = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('images/category'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $imgname); //lưu hình ảnh vào thư mục public/category

            // Đảm bảo xóa hình ảnh cũ nếu có
            if (!empty($category->image)) {
                $oldImagePath = public_path('images/category/') . $category->image;
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
        
        // return redirect(route('adminpages.category.getCateList'))->with('success','Cập nhật sản phẩm thành công!');
        return redirect()->route('admin.getCateList')->with('success','Cập nhật sản phẩm thành công!');
       
       
        // return redirect()->back()->with('success','Sửa danh mục thành công');
    }

//
    public function getCateDelete( string $id)
    {
        //
        Category::find($id)->delete();
        // $id->delete();
        return redirect()->back()->with('success','Xóa danh mục thành công');
    }
}