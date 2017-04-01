<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
    	'productid', 'url'
    ];

    public function product(){
    	return $this->belongsTo(Product::class, 'productid');
    }
}
