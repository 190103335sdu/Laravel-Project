<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use TCG\Voyager\Models\Category as ModelsCategory;


class Category extends ModelsCategory
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories');
    }

    public function allProducts()
    {
        $allProducts = $this->products;
        return $allProducts;

    }
}
