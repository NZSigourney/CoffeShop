<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use App\Models\product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('adminpages.slidebar.products.product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $types = product_type::all();
        return view('adminpages.slidebar.products.addproduct', compact('products', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = '';
        if($request->hasFile('image')){
            $this->validate($request, [
                'name' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'id_type' => 'required',
                // 'popular' => 'required'
                // 'unit' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                'descrtiption.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                'id_type.required' => 'vui lòng chọn danh mục'
                // 'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
            ]);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $destinationPath=public_path('assets/images/products'); //project\public\images, public_path(): trả về đường dẫn tới thư mục public
            if (file_exists($destinationPath . '/' . $name)) {
                return redirect('products')->with('message', 'Hình ảnh đã tồn tại. Vui lòng chọn hình ảnh khác.');
            }
            $file->move($destinationPath, $name);
        } else {
            $this->validate($request,[
                'name' => 'required',
                'image' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required',
                'id_type' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'image.required' => 'Bạn chưa chọn hình ảnh',
                'descrtiption.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)',
                'id_type.required' => 'vui lòng chọn danh mục'
            ]);
        }

        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        $products->new = 1;
        $products->popular = $request->popular;
        $products->id_type = $request->id_type;
        // $products->unit = $request->unit;
        $products->image = $name;
        $products->save();
        return redirect('products')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trả về view hiển thị thông tin chi tiết của món ăn
        $sp = Product::where('id', $id)->first();
        $loai = product_type::where('id', $id)->first();
        return view('navbar.products.product_detail', compact('sp', 'loai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $type = product_type::all();
        $bill = Bill::get();
        return view('adminpages.slidebar.products.editproduct', compact('products', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $img ='';
        $products = Product::findOrFail($id);

        if($request->hasFile('image')){
            $this->validate($request,[
                'name' => 'required',
                'description' => 'required',
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'id_type' => 'required'
                // 'unit' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'description.required' => 'Bạn chưa nhập mô tả',
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'id_type.required' => 'vui lòng chọn danh mục',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                // 'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
            ]);

            $file = $request->file('image');
            $img = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('assets/images/products'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $img); //lưu hình ảnh vào thư mục public/car

            // Đảm bảo xóa hình ảnh cũ nếu có
            if (!empty($products->image)) {
                $oldImagePath = public_path('assets/images/products/') . $products->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }else{
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'id_type' => 'required'
                // 'unit' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'description.required' => 'Bạn chưa nhập mô tả',
                'unit_price.required' => 'Bạn chưa nhập giá gốc',
                'promotion_price.required' => 'Bạn chưa nhập giá khuyến mãi',
                'id_type.required' => 'vui lòng chọn danh mục'
                // 'unit.required' => 'Bạn cần phải nhập Đơn vị của sản phẩm (Hộp/Cái)'
            ]);
            $img = $products->image;
        }
        // $product = Product::find($id);
        
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        //$product->image = $request->image;
        // $products->unit = $request->unit;
        $products->id_type = $request->id_type;
        // if($img == ''){
        //     $img = $products->image;
        // }
        $products->image = $img;
        $products->save();
        return redirect()->route('products.index')->with('success','Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::delete('delete from products where id = ?', [$id]);

        $products = Product::find($id);

        // Đảm bảo sản phẩm tồn tại
        if (!$products) {
            return redirect('products')->with('message', 'Sản phẩm không tồn tại!');
        }

        DB::delete('delete from products where id = ?', [$id]);
        // DB::statement("ALTER TABLE products AUTO_INCREMENT = $id");
        // Lấy giá trị ID tiếp theo
        $nextId = DB::table('products')->max('id') + 1;

        // Đặt lại AUTO_INCREMENT thành giá trị tiếp theo sau khi xóa
        DB::statement("ALTER TABLE products AUTO_INCREMENT = $nextId");

        // Image remove

        
        // Xóa hình ảnh cũ nếu có
        if (!empty($products->image)) {
            $oldImagePath = public_path('assets/images/products/') . $products->image;

            // Kiểm tra xem tệp tin tồn tại trước khi xóa
            if (file_exists($oldImagePath)) {
                // Thực hiện xóa tệp tin
                unlink($oldImagePath);
                return redirect('products')->with('message', 'Xóa thành công!');
            } else {
                return redirect('products')->with('message', 'Hình ảnh không tồn tại!');
            }
        }
        return redirect('products')->with('success', 'Xóa sản phẩm thành công');
    }

    // public function getRanking(){
    //     $products = Product::all();

    //     foreach($products as $product) {

    //     }
    // }
}
