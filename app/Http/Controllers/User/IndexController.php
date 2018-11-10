<?php

namespace App\Http\Controllers\User;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function Index()
    {
        return view('user.index');
    }

    public function Info()
    {
        $user = User::find(session('user')->user_id);
        return view('user.info',compact('user'));
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
                $user = User::find(session('user')->user_id);

                $_password = Crypt::decrypt($user->user_pass);
                if($input['password_o']==$_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->withErrors('密码修改成功！');
                }else{
                    return back()->withErrors('原密码错误！');
                }
            }else{
                return back()->withErrors($validator);
            }

        }else{
            return view('user.pass');
        }
    }

    public function Register()
    {
        if($input = Input::all()){

            $rules = [
                'user_name'=>'required|unique:user,user_name',
                'password'=>'required|between:6,20|confirmed',
            ];

            $message = [
                'user_name.required'=>'用户名不能为空！',
                'user_name.unique'=>'该用户名已经被注册了，请换一个用户名！',
                'password.required'=>'密码不能为空！',
                'password.between'=>'密码位数必须在6-20位之间！',
                'password.confirmed'=>'密码与确认密码不一致！',
            ];

            $user = [
                'user_name'=>null,
                'user_pass'=>null,
                'user_key'=>null,
            ];

            $validator = Validator::make($input,$rules,$message);

            if($validator->passes()){
                $user['user_name'] = $input['user_name'];
                $user['user_pass'] = Crypt::encrypt($input['password']);
                $user['user_key'] = md5(uniqid());

                $re = User::create($user);
                if($re)
                    return redirect('user/login');
                else
                    return back()->withErrors('用户创建失败！');
            }else{
                return back()->withErrors($validator);
            }

        }else{
            return view('user.register');
        }
    }

    public function ChangeUserKey()
    {
        $input = Input::all();
        $user = User::find(session('user')->user_id);
        $user->user_key = md5(uniqid());
        $re = $user->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => 'UserKey 更新成功！',
                'user_key' => $user->user_key
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'UserKey 更新失败！'
            ];
        }
        return $data;
    }
}
