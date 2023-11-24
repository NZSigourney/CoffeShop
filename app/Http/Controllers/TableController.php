<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller
{
    public function getTable(){
        return view('navbar.table');
    }
}
