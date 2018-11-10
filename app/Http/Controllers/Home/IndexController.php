<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Custom;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Home\CommonController;

class IndexController extends CommonController
{
    public function Index()
    {
        $pics = Article::orderBy('art_view','desc')->take(6)->get();

        $data = Article::orderBY('art_time','desc')->paginate(5);

        $custom = Custom::orderBy('custom_order','asc')->get();

        return view('home.index',compact('pics','data','custom'));
    }

    public function Indexa()
    {
        return redirect('user');
    }

    public function Cate($cate_id)
    {
        $field = Category::find($cate_id);

        $data = Article::where('cate_id',$cate_id)->orderBY('art_time','desc')->paginate(4);

        //当前分类的子分类

        return view('home.list',compact('field','data'));
    }

    public function Article($art_id)
    {
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

        return view('home.new',compact('field','article','data'));
    }
}
