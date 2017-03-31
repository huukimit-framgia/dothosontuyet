<?php

namespace App\Http\Controllers\Traits;

use App\Category;
use App\Product;
use App\Seo;

trait TemplateViews
{
    protected function view($view, $data = [])
    {
        $max = 6;
        $data['categories'] = Category::all();
        $data['randProducts'] = Product::take($max)->get();
        return view($view)->with($data);
    }

    /**
     * [findSeo description]
     *
     * @param  [type] $alias [description]
     * @return [type]        [description]
     */
    protected function findSeo($alias)
    {
        return Seo::where('alias', $alias)->first();
    }
}
