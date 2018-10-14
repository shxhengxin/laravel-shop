<?php

namespace App\Http\Controllers\coupon;

use App\Exceptions\CouponCodeUnavailableException;
use App\Models\CouponCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponCodesController extends Controller
{
    public function show($code) {
        if($record = CouponCode::where('code',$code)->first())
        {
            throw  new CouponCodeUnavailableException('优惠券不存在');
        }
        $record->checkAvailable();
        return $record;
    }
}
