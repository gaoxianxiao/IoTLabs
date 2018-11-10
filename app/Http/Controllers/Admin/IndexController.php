<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function Index()
    {
        return view('admin.index');
    }

    public function Info()
    {
        return view('admin.info');
    }

    //更改超级管理员密码
    public function pass()
    {
        if($input = Input::all()){

            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];

            $message = [
                'password.required'=>'新密码不能为空！',
                'password.between'=>'新密码位数必须在6-20位之间！',
                'password.confirmed'=>'新密码与确认密码不一致！',
            ];

            $validator = Validator::make($input,$rules,$message);

            if($validator->passes()){
                $admin = User::first();

                $_password = Crypt::decrypt($admin->user_pass);
                if($input['password_o']==$_password){
                    $admin->user_pass = Crypt::encrypt($input['password']);
                    $admin->update();
                    return back()->withErrors('密码修改成功！');
                }else{
                    return back()->withErrors('原密码错误！');
                }
            }else{
                return back()->withErrors($validator);
            }

        }else{
            return view('admin.pass');
        }
    }
}
