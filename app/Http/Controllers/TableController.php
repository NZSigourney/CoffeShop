<?php

namespace App\Http\Controllers;

use App\Models\Table;
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
        $tables->Types = $request->Types;
        // $tables->Status = $request->Status;
        $tables->Note = $request->Note;
        $tables->Date = $request->Date;
        $tables->Time = $request->Time;
        $tables->save();
        return redirect('table')->with('success', 'Thêm mới thành công!');
    }
}
