<?php

namespace App\Http\Controllers\User;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';

class LoginController extends Controller
{
    public function Login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码输入有误！');
            }

            $user = User::where('user_name',$input['user_name'])->first();

            if($user==null ||  Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','用户名或密码输入有误！');
            }

            session(['user'=>$user]);

            return redirect('user');

        }else {
            if(!session('user')){
                return view('user.login');
            }else {
                return redirect('user');
            }
        }
    }

    public function Code()
    {
        $code = new \Code;
        $code->make();
    }

    public function Quit()
    {
        session(['user'=>null]);
        return redirect('user/login');
    }


}
