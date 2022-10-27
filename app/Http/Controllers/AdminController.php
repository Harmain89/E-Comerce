<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $pass = $request->post('password');

        // $result = Admin::where(['email'=>$email, 'password'=>$pass])->get();
        $result = Admin::where(['email'=>$email])->first();

        if($result) {
            if(Hash::check($pass, $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            }
            else {
                $request->session()->flash('error','Please Enter Valid Login.');
                return redirect('admin');
            }
        }
        else {
            $request->session()->flash('error','Please Enter Valid Login.');
            return redirect('admin');
        }
    }

    public function auth_logout(Request $request)
    {

        $request->session()->flush();
        return redirect('admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function update_password()
    {
        $r = Admin::find(1);
        $r->password = Hash::make('admin');
        $r->save();
    }
}
