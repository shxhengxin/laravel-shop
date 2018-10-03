<?php

namespace App\Http\Controllers\cart;

use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;
use App\Models\ProductSku;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    protected $cartService;

    /**
     * CartController constructor.
     * 利用 Laravel 的自动解析功能注入 CartService 类
     * @param $cartService
     */
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index() {
        $cartItems = $this->cartService->get();
        $addresses = request()->user()->addresses()->orderBy('last_used_at', 'desc')->get();
        return view('cart.index',['cartItems'=>$cartItems,'addresses'=>$addresses]);
    }

    public function add(AddCartRequest $request) {
        $this->cartService->add($request->input('sku_id'), $request->input('amount'));
        return [];
    }

    public function remove(ProductSku $sku,Request $request) {
        //$request->user()->cartItems()->where('product_sku_id',$sku->id)->delete();
        $this->cartService->remove($sku->id);
        return [];
    }
}
