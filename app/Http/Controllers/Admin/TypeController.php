<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    //get admin/type
    public function Index()
    {
        $type = Type::orderBy('type_order','asc')->get();

        return view('admin.type.index')->with('data',$type);

    }

    public function Changeorder()
    {
        $input = Input::all();
        $type = Type::find($input['type_id']);
        $type->type_order = $input['type_order'];
        $re = $type->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '产品排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '产品排序更新失败！'
            ];
        }
        return $data;
    }

    //get admin/type/create
    public function Create()
    {
        return view('admin.type.add');
    }

    //post admin/type
    public function Store()
    {
        $input = Input::except('_token');

        $rules = [
            'type_name'=>'required',
            'type_pid'=>'required',
            'type_apikey'=>'required',
            'type_parsername'=>'required',
        ];

        $message = [
            'type_name.required'=>'产品名称不能为空！',
            'type_pid.required'=>'产品ID不能为空！',
            'type_apikey.required'=>'APIKEY不能为空！',
            'type_parsername.required'=>'解析脚本不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Type::create($input);
            if($re)
                return back()->withErrors('产品创建成功！');
            else
                return back()->withErrors('产品创建失败！');
        }else{
            return back()->withErrors($validator);
        }

    }

    //get admin/type/{type}/edit
    public function Edit($type_id)
    {
        $field = Type::find($type_id);
        return view('admin.type.edit',compact('field'));

    }

    //put admin/type/{type}
    public function Update($type_id)
    {
        $input = Input::except('_token','_method');

        $rules = [
            'type_name'=>'required',
            'type_pid'=>'required',
            'type_apikey'=>'required',
            'type_parsername'=>'required',
        ];

        $message = [
            'type_name.required'=>'产品名称不能为空！',
            'type_pid.required'=>'产品ID不能为空！',
            'type_apikey.required'=>'APIKEY不能为空！',
            'type_parsername.required'=>'解析脚本不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Type::where('type_id',$type_id)->update($input);
            if($re)
                return back()->withErrors('产品修改成功！');
            else
                return back()->withErrors('产品修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/type/{type}
    public function Destroy($type_id)
    {
        $re = Type::where('type_id',$type_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '产品删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '产品删除失败！',
            ];
        }
        return $data;
    }

    //get admin/type/{type}
    public function Show()
    {

    }

}
