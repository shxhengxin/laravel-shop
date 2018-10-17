<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price'
    ];
    protected $casts = ['on_sale'=>'boolean'];

    //与商品sku关联
    public function skus() {
        return $this->hasMany(ProductSku::class);
    }

    //图片添加完整的url
    public function getImageUrlAttribute() {
        if(Str::startsWith($this->attributes['image'],['http://','https://'])){
            return $this->attributes['image'];
        }
        return Storage::disk('admin')->url($this->attributes['image']);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
