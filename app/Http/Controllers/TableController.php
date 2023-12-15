<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\TableOrder;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function getTable(){
        return view('navbar.table');
    }

    public function orderTable(Request $request){
        $this->validate($request,[
            // 'Types' => 'required',
            'Note' => 'required',
            'Date' => 'required',
            'Time' => 'required',
        ],[
            'Note.required' => 'Bạn chưa nhập mô tả',
            'Date.required' => 'Bạn chưa chọn Ngày tháng năm',
            'Time.required' => 'Bạn chưa nhập giờ',
        ]);

        $tables = new Table();
        // $tables->ID = $request->ID;
        $tables->Customer = $request->Customer;
        $tables->Types = 1;
        // $tables->Status = $request->Status;
        $tables->Note = $request->Note;
        $tables->Date = $request->Date;
        $tables->Time = $request->Time;
        $tables->save();

        // $tbOrder = new TableOrder();
        // $tableStatus = $request->Status;
        // if($tableStatus == 0){
        //     return redirect('table')->with('success', 'Đặt bàn thành công!');
        // }elseif($tableStatus == 1){
        //     return redirect('table')->with('success', 'bàn này đã có người đặt');
        // }else{
        //     return redirect('home');
        // }
        return redirect('table')->with('success', 'Thêm mới thành công!');
    }
}
