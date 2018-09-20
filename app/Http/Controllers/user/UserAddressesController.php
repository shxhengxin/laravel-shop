<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAddressesController extends Controller
{
    public function index(Request $request) {
        $data = $request->user()->addresses;
        return view('user_addresses.index', ['addresses' => $data,]);
    }
}
