<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    // public function vnpay(string $id){
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = "http://127.0.0.1:8000/checkout";
    //     $vnp_TmnCode = "NYQAGW8P";//Mã website tại VNPAY 
    //     $vnp_HashSecret = "TNCAFPSXGTHKXYCMQGHNYWHIGALWBKXW"; //Chuỗi bí mật

    //     $vnp_TxnRef = mt_rand(1, 999); // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = 'Thanh toán VNPAY';
    //     $vnp_OrderType = 'billing payment';

    //     // $vnp_TxnRef = mt_rand(1000, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     // $vnp_OrderInfo = $_POST['order_desc'];
    //     // $vnp_OrderType = $_POST['order_type'];
    //     $vnp_Amount = 20000 * 100;
    //     $vnp_Locale = "VN";
    //     $vnp_BankCode = "NCB";
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //     //Add Params of 2.0.1 Version
    //     // $vnp_ExpireDate = $_POST['txtexpire'];
    //     //Billing
    //     // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    //     // $vnp_Bill_Email = $_POST['txt_billing_email'];
    //     // $fullName = trim($_POST['txt_billing_fullname']);
    //     // if (isset($fullName) && trim($fullName) != '') {
    //     //     $name = explode(' ', $fullName);
    //     //     $vnp_Bill_FirstName = array_shift($name);
    //     //     $vnp_Bill_LastName = array_pop($name);
    //     // }
    //     // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
    //     // $vnp_Bill_City=$_POST['txt_bill_city'];
    //     // $vnp_Bill_Country=$_POST['txt_bill_country'];
    //     // $vnp_Bill_State=$_POST['txt_bill_state'];
    //     // Invoice
    //     // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
    //     // $vnp_Inv_Email=$_POST['txt_inv_email'];
    //     // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
    //     // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
    //     // $vnp_Inv_Company=$_POST['txt_inv_company'];
    //     // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
    //     // $vnp_Inv_Type=$_POST['cbo_inv_type'];
    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,
    //         // "vnp_ExpireDate"=>$vnp_ExpireDate,
    //         // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    //         // "vnp_Bill_Email"=>$vnp_Bill_Email,
    //         // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    //         // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    //         // "vnp_Bill_Address"=>$vnp_Bill_Address,
    //         // "vnp_Bill_City"=>$vnp_Bill_City,
    //         // "vnp_Bill_Country"=>$vnp_Bill_Country,
    //         // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    //         // "vnp_Inv_Email"=>$vnp_Inv_Email,
    //         // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    //         // "vnp_Inv_Address"=>$vnp_Inv_Address,
    //         // "vnp_Inv_Company"=>$vnp_Inv_Company,
    //         // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    //         // "vnp_Inv_Type"=>$vnp_Inv_Type
    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }
    //     if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //         $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    //     }

    //     //var_dump($inputData);
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     $returnData = array('code' => '00', 'message' => 'success', 'data' => $vnp_Url);

    //     // $bill = Bill::findOrFail($id);
    //     if (isset($_POST['redirect'])) {
    //         header('Location: ' . $vnp_Url);
    //         DB::table('bills')->where('id', $id)->update([
    //             'payment' => 'VNPAY'
    //         ]);
    //         die();
    //     } else {
    //         echo json_encode($returnData);
    //     }
    //     // vui lòng tham khảo thêm tại code demo
    // }

    public function vnpay(Request $request){
        $method = $request->input('payment_method');

        if($method == 'COD'){
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
            $bill->payment = "COD";
            // $payment_method = $request->input('payment_method');
            // if($method == "COD"){
            //     $bill->payment = "COD";
            // }elseif($method == "VNPAY"){
            //     $bill->payment ="VNPAY";
            // }        
            $bill->note=$request->input('note');
            $bill->status = 0;
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
        }elseif($method == "VNPAY")
        {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/checkout";
            $vnp_TmnCode = "NYQAGW8P";//Mã website tại VNPAY 
            $vnp_HashSecret = "TNCAFPSXGTHKXYCMQGHNYWHIGALWBKXW"; //Chuỗi bí mật

            $vnp_TxnRef = mt_rand(1, 999); // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán VNPAY';
            $vnp_OrderType = 'billing payment';

            $cart = Session::get('cart');

// Kiểm tra xem giỏ hàng có tồn tại và không phải là boolean false
            if ($cart && is_array($cart)) {
                // Tính tổng cộng số tiền trong cart
                $totalAmount = 0;

                foreach ($cart as $item) {
                    // Kiểm tra xem 'price' và 'quantity' có tồn tại trong mỗi phần tử không
                    if (isset($item['price']) && isset($item['quantity'])) {
                        $totalAmount += $item['price'] * $item['quantity'];
                    }
                }

                // Nhân tổng cộng số tiền cho 100
                $vnp_Amount = $totalAmount * 100;
            } else {
                // Xử lý trường hợp giỏ hàng không tồn tại hoặc là boolean false
                // ... (ví dụ: gán giá trị mặc định cho $vnp_Amount)
                $vnp_Amount = 20000 * 100;
            }

            // $vnp_Amount = 20000 * 100;
            $vnp_Locale = "VN";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00', 'message' => 'success', 'data' => $vnp_Url);

            // $bill = Bill::findOrFail($id);
            $bill = new Bill();
            if (isset($_POST['payment_method'])) {
                // trả về trang payment
                header('Location: ' . $vnp_Url);

                // Code support
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
                // $payment_method = $request->input('payment_method');
                if($method == "COD"){
                    $bill->payment = "COD";
                }elseif($method == "VNPAY"){
                    $bill->payment ="VNPAY";
                }        
                $bill->note=$request->input('note');
                $bill->status = 0;
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
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }
}
