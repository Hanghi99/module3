<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if($request->remember = 'remember-me'){
            $remember = true;
        } else {
            $remember = false;
        }
        $arr = ['email'=>$request->email,'password'=>$request->password];
        if(Auth::attempt($arr,$remember)){
dd('thành công');
        }
   else{
dd('thất bại');
        }
    }
}
