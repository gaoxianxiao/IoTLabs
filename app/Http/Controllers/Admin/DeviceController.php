<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Device;
use App\Http\Model\Type;
use App\Http\Model\User;
use App\Http\Model\Variate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

require_once 'resources/org/remote/Remote.class.php';

class DeviceController extends Controller
{
    //get admin/device
    public function Index()
    {
        $devices = Device::Join('type','device.type_id','=','type.type_id')->get();
        return view('admin.device.index')->with('data',$devices);
    }

    //get admin/device/create
    public function Create()
    {
        $type = Type::orderBy('type_order','asc')->get();
        return view('admin.device.add')->with('data',$type);
    }

    //post admin/device
    public function Store()
    {
        $input = Input::except('_token');
        $input['dev_authcode'] = uniqid();

        $data['title'] = $input['dev_authcode'];
        $data['auth_info'] = $input['dev_authcode'];

        $type = Type::find($input['type_id']);
        $apikey = $type->type_apikey;
        $postUrl = "http://api.heclouds.com/devices";
        $curl = new \Remote;
        $devices = $curl->CURL($postUrl,'POST',$data,$apikey);

        $input['dev_pid'] = $devices->data->device_id;

        $re = Device::create($input);
        if($re && ($devices->errno == 0))
            return back()->withErrors('设备创建成功！');
        else
            return back()->withErrors('设备创建失败！');

    }

    //get admin/device/{device}/edit
    public function Edit($dev_id)
    {
        //$data = Type::all();
        $field = Device::find($dev_id);
        return view('admin.device.edit',compact('field'));

    }

    //put admin/device/{device}
    public function Update($dev_id)
    {
        $input = Input::except('_token','_method');
        if($input->dev_lock == 0)
            $input['user_id'] = 0;

        $re = Device::where('dev_id',$dev_id)->update($input);
        if($re)
            return back()->withErrors('设备修改成功！');
        else
            return back()->withErrors('设备修改失败！');

    }

    //delete admin/device/{device}
    public function Destroy($dev_id)
    {
        $devices = Device::Join('type','device.type_id','=','type.type_id')->where('dev_id',$dev_id)->first();
        $apikey = $devices->type_apikey;
        $dev_pid = $devices->dev_pid;
        $postUrl = "http://api.heclouds.com/devices/$dev_pid";
        $curl = new \Remote;
        $ore = $curl->CURL($postUrl,'DELETE',1,$apikey);

        $re = Device::where('dev_id',$dev_id)->delete();
        if($re && ($ore->errno == 0)){
            $data = [
                'status' => 0,
                'msg' => '设备删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '设备删除失败！',
            ];
        }
        return $data;
    }

    //get admin/device/{device}
    public function Show($dev_id)
    {

    }




}
