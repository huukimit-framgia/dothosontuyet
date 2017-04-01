<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetails';

    protected $fillable = [
        'orderid', 'productid', 'quatity', 'amount'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'orderid');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'productid');
    }
}
