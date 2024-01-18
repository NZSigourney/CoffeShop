<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailControler;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminLoginMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('product/{id}', [PageController::class, 'product']);
Route::get('product', [PageController::class, 'sanpham_main'])->name('product');
// Route::get('product/category/{id}', [PageController::class, 'product_category'])->name('product.category');

// Route::resource('Pages', PageController::class);

Route::get('list_like', [PageController::class,'list_like'])->name('list_like');
Route::get('shopping_cart', [PageController::class,'shopping_cart'])->name('shopping_cart'); 



// Contacts page
Route::get('lienhe', [ContactController::class, 'getUserContacts'])->name('contact');
Route::get('contacts', [ContactController::class, 'getContactMail'])->name('admin.getContactMail');
Route::post('contacts', [ContactController::class, 'postContactMail'])->name('admin.postContactMail');
Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete');
Route::put('contacts/{id}',  [ContactController::class, 'update'])->name('admin.updateContact');

Route::get('about', [PageController::class, 'about'])->name('about');
// Checkout page

Route::get('checkout', [PageController::class, 'getCheckout'])->name('banhang.getdathang');
Route::post('checkout', [PageController::class, 'postCheckout'])->name('banhang.postdathang');
// Route::get('show', [PageController::class, 'showcart'])->name('banhang.showcart');

// Shopping cart

Route::get('cart', [PageController::class, 'cart'])->name('cart.detailed');

Route::get('add-to-cart/{id}',[PageController::class,'addToCart'])->name('banhang.addToCart');
Route::post('updateCart/{id}', [PageController::class, 'updateCartItem'])->name('banhang.updateCart');
Route::post('del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');

// singin page

Route::get('dangky',[UserController::class,'getSignin'])->name('getsignin');
Route::post('dangky',[UserController::class,'postSignin'])->name('postsignin');

// Login Page
Route::get('dangnhap', [UserController::class, 'getLogin'])->name('admin.getLogin');
Route::post('dangnhap', [UserController::class, 'postLogin'])->name('admin.postLogin');



// Change Password
Route::get('doi-mat-khau', [MailControler::class, 'getChangePwd'])->name('user.getChangePwd');
Route::post('doi-mat-khau/account/{id}', [MailControler::class, 'ChangePassword'])->name('user.postChangePwd');

// profile
Route::get('profile', [ProfileController::class, 'getProfiles'])->name('user.Profiles');
Route::get('profile/{id}', [ProfileController::class, 'getEditProfiles'])->name('user.GetEditProfile');
Route::post('profile/{id}', [ProfileController::class, 'postEditProfiles'])->name('user.PostEditProfile');

// Route::get('profile/{id}', [UserController::class, 'getTestProfile'])->name('user.GetTestProfile');

Route::resource('users', UserController::class);

// Admin page

Route::middleware(['AdminLoginMiddleware'])->group(function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// // Admin Page - Login
// Route::get('/admin/dangnhap', [UserController::class, 'getLogin'])->name('admin.getLogin');
// Route::post('/admin/dangnhap', [UserController::class, 'postLogin'])->name('admin.postLogin');

// Admin Page - Logout
Route::get('dangxuat', [UserController::class, 'getLogout'])->name('getLogout');

// Admin Page - Group

// Route::group(['prefix' => 'admin', 'middleware' => 'AdminLoginMiddleware'], function(){
//     Route::group(['prefix' => 'category'], function(){
//         Route::get('danhsach', [CategoryController::class, 'getCatelist'])->name('admin.getCateList');
//         Route::get('them', [CategoryController::class, 'getCateAdd'])->name('admin.getCateAdd');
//         Route::post('them', [CategoryController::class, 'postCateAdd'])->name('admin.postCateAdd');
//         Route::get('xoa/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.getCateDelete');
//         Route::get('sua/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.getCateEdit');
//         Route::post('sua/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.postCateEdit');
//     });

//     Route::group(['prefix' => 'product_detail'], function(){
//         Route::get('detailed-product', [PageController::class, 'getChiTiet'])->name('admin.getDetailProduct');
//     });
// });

// San pham admin
Route::get('sanpham-admin', [UserController::class, 'sanpham']);

Route::resource('products', ProductController::class);
// Route::get('addproducts', [ProductController::class, 'create']);

// Route::get('products', [ProductController::class, 'index'])->name('sanphamadmin');

// User Admin
Route::get('/admin/edituser/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/admin/deleteuser/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('createadminaccount', [UserController::class, 'create']);
// Route::get('/admin/createuser', [UserController::class, 'store'])->name('users.store');

Route::get('adminaccounts', [UserController::class, 'useraccount']);



// Bills
Route::resource('bills', BillController::class);
Route::get('billList', [BillController::class, 'index'])->name('admin.getBillList');
Route::put('bill/{id}', [BillController::class, 'updateBillAdmin'])->name('admin.updateBill');

// Category
Route::get('product_type/{type}', [CategoryController::class,'product_type'])->name('getProductType');
// Route::get('product_type/{type}', [CategoryController::class, 'header_type_product'])->name('product_type');  
Route::get('danhsach', [CategoryController::class, 'getCatelist'])->name('admin.getCateList');
Route::get('them', [CategoryController::class, 'getCateAdd'])->name('admin.getCateAdd');
Route::post('them', [CategoryController::class, 'postCateAdd'])->name('admin.postCateAdd');
Route::delete('xoa/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.getCateDelete');
Route::get('sua/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.getCateEdit');
Route::put('sua/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.postCateEdit');

// Mail
Route::get('input-email', [MailControler::class, 'getInputEmail'])->name('getEmail');
Route::post('input-email', [MailControler::class, 'postInputEmail'])->name('postEmail');

// Table Pages.
Route::get('table', [TableController::class, 'getTable'])->name('table');
Route::post('table', [TableController::class, 'orderTable'])->name('orderTable');

Route::get('search', [PageController::class, 'getSearch'])->name('user.getSearch');

Route::resource('sliders', SlideController::class);
Route::put('edit/slider/{id}', [SlideController::class, 'update'])->name('admin.SliderEdit');

// payment
Route::post('/vnpay-payment', [PaymentController::class, 'vnpay'])->name('vnpay');