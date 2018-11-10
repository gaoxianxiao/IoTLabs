<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    //get admin/navs
    public function Index()
    {
        $data = Navs::orderBy('navs_order','asc')->get();

        return view('admin.navs.index',compact('data'));
    }

    public function Changeorder()
    {
        $input = Input::all();
        $navs = Navs::find($input['navs_id']);
        $navs->navs_order = $input['navs_order'];
        $re = $navs->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '导航排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '导航排序更新失败！'
            ];
        }
        return $data;
    }

    //get admin/navs/create
    public function Create()
    {
        return view('admin.navs.add');
    }

    //post admin/navs
    public function Store()
    {
        $input = Input::except('_token');

        $rules = [
            'navs_name'=>'required',
            'navs_url'=>'required',
        ];

        $message = [
            'navs_name.required'=>'导航名称不能为空！',
            'navs_url.required'=>'导航网址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Navs::create($input);
            if($re)
                return redirect('admin/navs');
            else
                return back()->withErrors('导航创建失败！');
        }else{
            return back()->withErrors($validator);
        }

    }

    //get admin/navs/{navs}/edit
    public function Edit($navs_id)
    {
        $field = Navs::find($navs_id);
        return view('admin.navs.edit',compact('field'));

    }

    //put admin/navs/{navs}
    public function Update($navs_id)
    {
        $input = Input::except('_token','_method');

        $rules = [
            'navs_name'=>'required',
            'navs_url'=>'required',
        ];

        $message = [
            'navs_name.required'=>'导航名称不能为空！',
            'navs_url.required'=>'导航网址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Navs::where('navs_id',$navs_id)->update($input);
            if($re)
                return redirect('admin/navs');
            else
                return back()->withErrors('导航修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/navs/{navs}
    public function Destroy($navs_id)
    {
        $re = Navs::where('navs_id',$navs_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '导航信息删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '导航信息删除失败！',
            ];
        }
        return $data;
    }

    //get admin/navs/{navs}
    public function Show()
    {

    }
}
