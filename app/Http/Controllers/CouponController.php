<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit(Request $request)
    {
        $coupon_id = $request->togetid;
        $coupon_title = $request->coupon_title;
        $coupon_code = $request->coupon_code;
        $coupon_value = $request->coupon_value;

        DB::table('coupons')
              ->where('id', $coupon_id)
              ->update([
                'title' => $coupon_title,
                'code' => $coupon_code,
                'value' => $coupon_value,
              ]);

        return [
            "msg" => "Coupon ( ".$coupon_title." ) has been Generated!",
        ];
    }

    public function delete(Request $request)
    {
        $coupon_id = $request->row_id;
        $coupon_title = $request->coupon_title;

        if($coupon_id != '') {
            $data = $coupon_id;
            $model = Coupon::find($coupon_id)->delete();
        }

        return [
            "msg" => $coupon_title . " has been deleted!",
            "errormsg" => $data
        ];
    }

}
