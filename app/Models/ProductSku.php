<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $fillable = ['title', 'description', 'price', 'stock'];

    //sku属于那个商品
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
