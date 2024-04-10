<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminClientController extends Controller
{
    //

    public function register()
    {
        return view('userclient.register');
    }

    //xây dựng hàm add tài khoản khách hàng
    public function addUsersClient(Request $request)
    {
     
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);

        return redirect('client/login')->with('status',"Bạn đã đăng kí thành công rồi nè");
    }

    //xây dựng hàm login tài khoản khách hàng

  public function showLogin()
  {
    return view('userclient.login');
  }

    //xay dung ham thuc thi chuc nang login

    public function loginUsersClient(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // var_dump(Auth::guard('userclients')->attempt($credentials)); die();
        if (Auth::attempt($credentials)) {
            
            return redirect('/index')->with('status', "Bạn đã đăng nhập thành công");
        }

        return back()->withErrors(['status' => "Email hoặc mật khẩu không chính xác."]);
       
    }

    

}
