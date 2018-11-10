<?php

namespace App\Http\Controllers\User;

use App\Http\Model\Device;
use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

require_once 'resources/org/remote/Remote.class.php';

class TypeController extends Controller
{
    //get user/type
    public function Index()
    {
        $type = Type::get();
        foreach ($type as $k => $v){
           $type[$k]['count'] = Device::where([['type_id',$v->type_id],['user_id',SESSION('user')->user_id],])->count();
        }
        return view('user.type.index')->with('data',$type);
    }

    public function Changeorder()
    {
        $input = Input::all();
        $cate = Variate::find($input['var_id']);
        $cate->var_order = $input['var_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '变量排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '变量排序更新失败！'
            ];
        }
        return $data;
    }


    public function Refresh()
    {
        $input = Input::all();
        $type_id = $input['type_id'];
        //防止其他用户访问别人的设备，需验证当前的dev_id是否属于该user_id
        $type = Type::find($type_id);
        $devices = Device::where([['type_id',$type_id],['user_id',SESSION('user')->user_id],])->get();
        $apikey = $type->type_apikey;
        $dev_pid = '';
        foreach ($devices as  $v){
            $dev_pid .= $v->dev_pid;
            $dev_pid .= ',';
        }

        $postUrl = "http://api.heclouds.com/devices/status?devIds=$dev_pid";
        $curl = new \Remote;
        $data = $curl->Curl($postUrl,'GET',1,$apikey);

        return $data->data->devices;
    }

    //get user/type/{type}
    public function Show($type_id)
    {
        $type = Type::find($type_id);
        $devices = Device::where([['type_id',$type_id],['user_id',SESSION('user')->user_id],])->get();
        $apikey = $type->type_apikey;
        $dev_pid = '';
        foreach ($devices as  $v){
        $dev_pid .= $v->dev_pid;
        $dev_pid .= ',';
        }

        $postUrl = "http://api.heclouds.com/devices/status?devIds=$dev_pid";
        $curl = new \Remote;
        $data = $curl->Curl($postUrl,'GET',1,$apikey);

        return view('user.type.show',compact('data','devices','type_id'));
    }

}
