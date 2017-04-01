<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'userid', 'customerid', 'total', 'amount', 'payment', 'paymentinfo', 'status'
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'orderid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customerid');
    }
}
