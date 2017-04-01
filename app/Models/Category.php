<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'desc', 'parentid'];

    public function category()
    {
        // return $this->hasOne(Category::class, 'parent_id'); // => where parentid = primary_value;
        return $this->belongsTo(Category::class, 'parentid');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parentid');
    }

    public function seo()
    {
        return $this->belongsTo(Seo::class, 'seoid');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'categoryid');
    }
}
