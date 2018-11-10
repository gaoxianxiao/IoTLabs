@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  全部分类
</div>
<!--面包屑导航 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>
                <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>分类列表</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>分类名称</th>
                    <th>分类标题</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="ChangeOrder(this,{{$v->cate_id}})" value="{{$v->cate_order}}">
                    </td>
                    <td class="tc">{{$v->cate_id}}</td>
                    <td>
                        <a href="#">{{$v->cate_name}}</a>
                    </td>
                    <td>{{$v->cate_title}}</td>
                    <td>
                        <a href="{{url('admin/category/'.$v->cate_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="delCate({{$v->cate_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <br/>
            <input type="button" class="back" onclick="window.location = '{{url('admin/category/')}}'" value="刷新">
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
function ChangeOrder(obj,cate_id){
    var cate_order = $(obj).val();
    $.post("{{url('admin/cate/changeorder')}}",{'_token':'{{csrf_token()}}','cate_id':cate_id,'cate_order':cate_order},function(data){
        if(data.status)
            layer.msg(data.msg , {icon: 5});
        else
            layer.msg(data.msg , {icon: 6});
    });
}
//删除分类
function delCate(cate_id) {
    layer.confirm('您确定要删除这个分类吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        $.post("{{url('admin/category')}}/"+cate_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
            if(data.status){
                layer.msg(data.msg, {icon: 5});
            }else{
                location.href = location.href;
                layer.msg(data.msg, {icon: 6});
            }
        });
    }, function(){

    });
}
</script>
@endsection
