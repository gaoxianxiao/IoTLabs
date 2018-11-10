<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Custom;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CustomController extends Controller
{
    //get admin/custom
    public function Index()
    {
        $data = Custom::orderBy('custom_order','asc')->get();

        return view('admin.custom.index',compact('data'));
    }

    public function Changeorder()
    {
        $input = Input::all();
        $custom = Custom::find($input['custom_id']);
        $custom->custom_order = $input['custom_order'];
        $re = $custom->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '客户排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '客户排序更新失败！'
            ];
        }
        return $data;
    }

    //get admin/custom/create
    public function Create()
    {
        return view('admin.custom.add');
    }

    //post admin/custom
    public function Store()
    {
        $input = Input::except('_token');

        $rules = [
            'custom_name'=>'required',
            'custom_website'=>'required',
        ];

        $message = [
            'custom_name.required'=>'客户名称不能为空！',
            'custom_website.required'=>'客户网址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Custom::create($input);
            if($re)
                return redirect('admin/custom');
            else
                return back()->withErrors('客户信息创建失败！');
        }else{
            return back()->withErrors($validator);
        }

    }

    //get admin/custom/{custom}/edit
    public function Edit($custom_id)
    {
        $field = Custom::find($custom_id);
        return view('admin.custom.edit',compact('field'));

    }

    //put admin/custom/{custom}
    public function Update($custom_id)
    {
        $input = Input::except('_token','_method');

        $rules = [
            'custom_name'=>'required',
            'custom_website'=>'required',
        ];

        $message = [
            'custom_name.required'=>'客户名称不能为空！',
            'custom_website.required'=>'客户网址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Custom::where('custom_id',$custom_id)->update($input);
            if($re)
                return redirect('admin/custom');
            else
                return back()->withErrors('客户信息修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/custom/{custom}
    public function Destroy($custom_id)
    {
        $re = Custom::where('custom_id',$custom_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '客户信息删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '客户信息删除失败！',
            ];
        }
        return $data;
    }

    //get admin/custom/{custom}
    public function Show()
    {

    }
}
