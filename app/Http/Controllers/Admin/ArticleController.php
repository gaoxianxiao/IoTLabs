<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    //get admin/article
    public function Index()
    {
        $data = Article::orderBy('art_id','desc')->paginate(5);

        return view('admin.article.index',compact('data'));

    }

    //get admin/article/create
    public function Create()
    {
        $data = Category::all();
        return view('admin.article.add',compact('data'));
    }

    //post admin/article 添加文章
    public function Store()
    {
        $input = Input::except('_token');
        $input['art_time'] = time();

        $rules = [
            'art_title'=>'required',
            'art_content'=>'required',
        ];

        $message = [
            'art_title.required'=>'文章标题不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Article::create($input);
            if($re)
                return redirect('admin/article');
            else
                return back()->withErrors('文章创建失败！');
        }else{
            return back()->withErrors($validator);
        }

    }

    //get admin/article/{article}/edit
    public function Edit($art_id)
    {
        $data = Category::all();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));

    }

    //put admin/article/{article}
    public function Update($art_id)
    {
        $input = Input::except('_token','_method');
        $input['art_time'] = time();

        $rules = [
            'art_title'=>'required',
            'art_content'=>'required',
        ];

        $message = [
            'art_title.required'=>'文章标题不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Article::where('art_id',$art_id)->update($input);
            if($re)
                return redirect('admin/article');
            else
                return back()->withErrors('文章修改失败！');
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/article/{article}
    public function Destroy($art_id)
    {
        $re = Article::where('art_id',$art_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '文章删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '文章删除失败！',
            ];
        }
        return $data;
    }

    //图片上传
    public function Upload()
    {
        $file = Input::file('Filedata');
        if($file -> isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }

}
