<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $link_active = "category";
        $data = Coupon::all();
        return view('admin.coupons.coupon', [
            'data' => $data
        ]);
    }

    public function manage_coupon()
    {
        return view('admin.coupons.add_coupon');
    }

    public function create(Request $request)
    {
        $coupon_title = $request->post('coupon_title');
        $coupon_code = $request->post('coupon_code');
        $coupon_value = $request->post('coupon_value');

        $model = new Coupon();
        $model->title = $coupon_title;
        $model->code = $coupon_code;
        $model->value = $coupon_value;
        $model->save();

        return [
            "msg"=>"Category ( ".$coupon_title." ) has been saved!",
        ];

    }

}
