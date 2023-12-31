<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    public function customer(){
        return $this->belongsTo(Customer::class,'id_customer', 'id');
    }

    public function billDetail(){
        return $this->belongsTo(BillDetail::class, 'id_bill', 'id');
    }
}
