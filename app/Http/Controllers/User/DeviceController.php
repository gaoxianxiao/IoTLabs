<?php

namespace App\Http\Controllers\User;

use App\Http\Model\Device;
use App\Http\Model\Type;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

require_once 'resources/org/remote/Remote.class.php';

class DeviceController extends Controller
{
    //get user/device
    public function Index()
    {
        $devices = Device::Join('type','device.type_id','=','type.type_id')->where('user_id',SESSION('user')->user_id)->get();

        return view('user.device.index')->with('data',$devices);

    }

    public function Changeorder()
    {
        $input = Input::all();
        $cate = Device::find($input['dev_id']);
        $cate->dev_order = $input['dev_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '设备排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '设备排序更新失败！'
            ];
        }
        return $data;
    }

    //get user/device/create
    public function Create()
    {
        return view('user.device.add');
    }

    //post user/device
    public function Store()
    {
        $input = Input::except('_token');
        $input['dev_lock'] = 1;

        $rules = [
            'dev_authcode'=>'required',
            'dev_name'=>'required',
        ];

        $message = [
            'dev_authcode.required'=>'鉴权码不能为空！',
            'dev_name.required'=>'设备名称不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $device = Device::where('dev_authcode',$input['dev_authcode'])->first();

            if($device==null){
                return back()->withErrors('鉴权码输入有误！');
            }elseif($device->dev_lock){
                return back()->withErrors('设备已被绑定过！如设备是属于您的请与厂家联系！');
            }else {
            $re = Device::where('dev_authcode',$input['dev_authcode'])->update($input);
            if($re)
                return redirect('user/device');
            else
                return back()->withErrors('设备绑定失败！');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    //get user/device/{device}/edit
    public function Edit($dev_id)
    {
        //防止其他用户访问别人的设备，需验证当前的dev_id是否属于该user_id
        $field = Device::where([['dev_id',$dev_id],['user_id',SESSION('user')->user_id],])->first();
        if($field)
        {
            return view('user.device.edit',compact('field'));
        }else{
            return redirect('user/device');
        }
    }

    //put user/device/{device}
    public function Update($dev_id)
    {
        $input = Input::except('_token','_method');
        $input['dev_lock'] = 1;

        $rules = [
            'dev_name'=>'required',
        ];

        $message = [
            'dev_name.required'=>'设备名称不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);


        if($validator->passes()){
            $re = Device::where([['dev_id',$dev_id],['user_id',SESSION('user')->user_id],])->update($input);
            if($re)
                return redirect('user/device');
            else
                return back()->withErrors('设备修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete user/device/{device}
    public function Destroy($dev_id)
    {
        $input = [
            'dev_lock' => 0,
            'user_id' => 0,
        ];
        //防止其他用户访问别人的设备，需验证当前的dev_id是否属于该user_id
        $re = Device::where([['dev_id',$dev_id],['user_id',SESSION('user')->user_id],])->update($input);
        if($re){
            $data = [
                'status' => 0,
                'msg' => '设备解绑成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '设备解绑失败！',
            ];
        }
        return $data;
    }

    //get user/device/{device}
    public function Show($dev_id)
    {
        //防止其他用户访问别人的设备，需验证当前的dev_id是否属于该user_id
        $devices = Device::Join('type','device.type_id','=','type.type_id')->where([['dev_id',$dev_id],['user_id',SESSION('user')->user_id],])->first();
        $apikey = $devices->type_apikey;
        $dev_pid = $devices->dev_pid;
        $postUrl = "http://api.heclouds.com/devices/$dev_pid/datastreams";
        $curl = new \Remote;
        $data = $curl->CURL($postUrl,'GET',1,$apikey);

        return view('user.device.show',compact('data','devices'));
    }

    public function Refresh()
    {
        $input = Input::all();
        //防止其他用户访问别人的设备，需验证当前的dev_id是否属于该user_id
        $devices = Device::Join('type','device.type_id','=','type.type_id')->where([['dev_id',$input['dev_id']],['user_id',SESSION('user')->user_id],])->first();
        $apikey = $devices->type_apikey;
        $dev_pid = $devices->dev_pid;
        $postUrl = "http://api.heclouds.com/devices/$dev_pid/datastreams";
        $curl = new \Remote;
        $data = $curl->CURL($postUrl,'GET',1,$apikey);

        return $data->data;
    }

}
