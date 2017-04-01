<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $quatity = 0;
    protected $amount = 0;

    protected $fillable = [
        'name',
        'shortdesc',
        'longdesc',
        'thumb',
        'imprice',
        'price',
        'viewed',
        'status',
        'seoid',
        'categoryid',
    ];

    public function getQuatity()
    {
        return $this->quatity;
    }

    public function setQuatity($quatity)
    {
        $this->quatity = $quatity;
        $this->amount = $quatity * $this->price;
    }

    public function incre()
    {
        $this->quatity += 1;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'productid');
    }

    public function seo()
    {
        return $this->belongsTo(Seo::class, 'seoid');
    }

}
