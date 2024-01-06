<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\List_Like;
use App\Models\Product;
use App\Models\product_type;
use App\Models\Slide;
// use App\Models\User;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index(){
        // $products = Product::all();
        $products = Product::where('new', 1)->get();
        $new_slides = Slide::all();
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
        // $top_products = Product::where('top', 1)->get();
        return view('index', ['products' => $products, 'new_slides' => $new_slides, 'sanpham_khuyenmai' => $sanpham_khuyenmai]);
    }

    public function product(Request $req){
        // $details = Product::all();
        $sanpham = Product::where('id', $req->id)->first();
        if ($sanpham) {
            $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(3);
            // Tiếp tục xử lý dữ liệu ở đây
        } else {
            // Xử lý trường hợp khi $sanpham là null
            if (!$sanpham) {
                // Xử lý trường hợp không tìm thấy sản phẩm
                // Ví dụ: trả về 404 hoặc thông báo lỗi
                return abort(404); // Trả về trang lỗi 404
            }
        }
        $loai = product_type::all();
            
        // $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(3);
        // return view('product', ['products' => $details]);
        return view('product', compact('sanpham', 'sp_tuongtu', 'loai'));
    }

    public function sanpham_main(){
        $details = Product::all();
        // $sliders = Slide::all();
        return view('product', ['products' => $details]);
    }
    

    // //liên hệ
    // public function contacts(){
    //     return view('contacts.contacts');
    // }
    
    //thông tin
    public function about(){
        return view('navbar.about');
    }

    public function cart(){
        return view('cart');
    }
    
    //kiểm tra
    public function getCheckout(){
        return view('checkout');
    }

    public function showcart(){
        return view('navbar.cartbutton.show');
    }

    public function postCheckout(Request $request){
        // if ($request->has('clearCart')) {
        //     // Xóa giỏ hàng và chuyển hướng trở lại trang đặt hàng
        //     Session::forget('cart');
        //     return redirect()->back()->with('success', 'Đã xóa giỏ hàng.');
        // }
        
        $cart=Session::get('cart');
        $customer=new Customer();
        $customer->name=$request->input('name');
        $customer->gender=$request->input('gender');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->phone_number=$request->input('phone_number');
        $customer->note=$request->input('note');
        // $customer->status = $request->input('status');
        $customer->save();

        $bill=new Bill();
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$request->input('payment_method');
        $bill->note=$request->input('notes');
        $bill->status = $request->input('status');
        $bill->save();

        foreach($cart->items as $key=>$value)
        {
            $bill_detail=new BillDetail();
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('success','Đặt hàng thành công');
    }

    // End Checkout area

    // public function shopping_cart(){
    //     return view('carts');
    // }

    public function addToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $qty = $request->input('quantity');
        $cart->add($product, $id, $qty);
        $request->session()->put('cart',$cart);

        // if($request->ajax()) {
        //     $cartItems = $cart->items;
        //     $view = view('navbar.cartbutton.show', compact('cartItems'))->render();
        //     return response()->json(['html' => $view]); 
        // }

        Session::flash('success', 'Add to cart success!');
        return redirect()->back();
    }

    //thêm 1 sản phẩm có số lượng >1 có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
    public function addManyToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addMany($product,$id,$request->qty);
        $request->session()->put('cart',$cart);
       
        return redirect()->back();
    }


    public function delCartItem($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else Session::forget('cart');
        return redirect()->back();
    }

    // public function delCartItem($id){
    //     $oldCart = session()->has('cart') ? session()->get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->removeItem($id);
    
    //     if (count($cart->items) > 0) {
    //         session()->put('cart', $cart);
    //     } else {
    //         // Nếu giỏ hàng trống, xóa session
    //         session()->forget('cart');
    //     }
    
    //     return redirect()->back();
    // }    

    public function getSearch(Request $request){
        $result = $request->input('search');
        $product = Product::where('name','like','%'.$result.'%')->orWhere('unit_price',$request->unit_price)->get();
        // $loai = product_type::all();
        return view('navbar.search', compact('product'));

        // $loai = product_type::all();
        // $product = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price',$request->key)->get();
        // return view('navbar.search', compact('product', 'loai'));
    }

    //yêu thích
    public function list_like()
    {
        $list_like = session('list_like');
        $new_products = [];

        if ($list_like) {
            foreach ($list_like->items as $item) {
                $new_products[] = $item['item'];
            }
        }

        return view('list_like', compact('new_products'));
    }

    // Thêm 1 sản phẩm có id cụ thể vào danh sách yêu thích
    public function addToList(Request $request, $id)
    {
        $product = Product::find($id);
        $oldList = $request->session()->has('list_like') ? $request->session()->get('list_like') : null;
        $list = new List_Like($oldList);
        $list->add($product, $id);
        $request->session()->put('list_like', $list);
        
        // Thông báo đã thêm sản phẩm vào danh sách yêu thích
        $message = 'Đã thêm sản phẩm vào danh sách yêu thích.';
        return redirect()->back()->with('message', $message);
    }

    // Xóa 1 sản phẩm khỏi danh sách yêu thích dựa trên id
    public function delListItem($id)
    {
        $oldList = Session::has('list_like') ? Session::get('list_like') : null;
        $list = new List_Like($oldList);
        
        // Kiểm tra xem người dùng muốn xóa sản phẩm hay không

            $list->removeItem($id);
            if (count($list->items) > 0) {
                Session::put('list_like', $list);
            } else Session()->forget('list_like');
            // Thông báo đã xóa sản phẩm khỏi danh sách yêu thích
            $message = 'Đã xóa sản phẩm khỏi danh sách yêu thích.';
            return redirect()->back()->with('message', $message);
        
    }
}
