<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableOrder extends Model
{
    use HasFactory;
    protected $table = 'tableorder';

    // public function Table(){
    //     return $this->hasMany(Table::class, 'Types', 'id');
    // }
}