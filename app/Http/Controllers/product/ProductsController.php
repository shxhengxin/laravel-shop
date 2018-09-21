<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(Request $request,Product $product) {
        $products = $product->query()->where('on_sale',true)->paginate(16);
        return view('products.index', ['products' => $products]);
    }
}
