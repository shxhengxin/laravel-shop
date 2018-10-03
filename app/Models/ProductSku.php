<?php

namespace App\Models;

use App\Exceptions\InternalException;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $fillable = ['title', 'description', 'price', 'stock'];

    //sku属于那个商品
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @desc 判断是否超卖现象
     * @Author shenhengxin
     * @param $amount
     * @return int
     */
    public function decreaseStock($amount) {
        if($amount < 0){
            throw  new InternalException('减库存不可小于0');
        }
            //update product_skus set stock = stock - $amount where id = $id and stock >= $amount
            //可以保证不会出现执行之后 stock 值为负数的情况，也就避免了超卖的问题。而且我们用了数据库查询构造器，可以通过返回的影响行数来判断减库存操作是否成功，如果不成功说明商品库存不足。
        return $this->newQuery()->where('id',$this->id)->where('stock', '>=', $amount)->decrement('stock', $amount);

    }

    public function addStock($amount)
    {
        if ($amount < 0) {
            throw new InternalException('加库存不可小于0');
        }
        $this->increment('stock', $amount);
    }
}
