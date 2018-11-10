<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //get admin/category
    public function Index()
    {
        $categorys = Category::orderBy('cate_order','asc')->get();

        return view('admin.category.index')->with('data',$categorys);

    }

    public function Changeorder()
    {
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '分类排序更新成功！'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类排序更新失败！'
            ];
        }
        return $data;
    }

    //get admin/category/create
    public function Create()
    {
        return view('admin.category.add');
    }

    //post admin/category
    public function Store()
    {
        $input = Input::except('_token');

        $rules = [
            'cate_name'=>'required',
        ];

        $message = [
            'cate_name.required'=>'分类名称不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Category::create($input);
            if($re)
                return back()->withErrors('分类创建成功！');
            else
                return back()->withErrors('分类创建失败！');
        }else{
            return back()->withErrors($validator);
        }

    }

    //get admin/category/{category}/edit
    public function Edit($cate_id)
    {
        $field = Category::find($cate_id);
        return view('admin.category.edit',compact('field'));

    }

    //put admin/category/{category}
    public function Update($cate_id)
    {
        $input = Input::except('_token','_method');

        $rules = [
            'cate_name'=>'required',
        ];

        $message = [
            'cate_name.required'=>'分类名称不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Category::where('cate_id',$cate_id)->update($input);
            if($re)
                return back()->withErrors('分类修改成功！');
            else
                return back()->withErrors('分类修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/category/{category}
    public function Destroy($cate_id)
    {
        $re = Category::where('cate_id',$cate_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '分类删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类删除失败！',
            ];
        }
        return $data;
    }

    //get admin/category/{category}
    public function Show()
    {

    }

}
