<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function auth(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $result = Admin::where(['email'=>$email, 'password'=>$pass])->get();

        if(isset($result['0']->id)) {

        }
        else {
            $request->session()->flash('error','Please Enter Valid Login.');
            return redirect('admin');
        }
    }
}
