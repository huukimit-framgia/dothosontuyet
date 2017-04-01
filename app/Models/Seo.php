<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seos';
    protected $fillable = ['title', 'desc', 'alias'];

    public function category()
    {
        return $this->hasOne(Category::class, 'seoid');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'seoid');
    }
}
