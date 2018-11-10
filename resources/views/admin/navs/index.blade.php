@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  导航信息
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
                <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>添加导航</a>
                <a href="{{url('admin/navs')}}"><i class="fa fa-recycle"></i>导航列表</a>
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
                    <th>导航名称</th>
                    <th>导航别名</th>
                    <th>导航网址</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="ChangeOrder(this,{{$v->navs_id}})" value="{{$v->navs_order}}">
                    </td>
                    <td class="tc">{{$v->navs_id}}</td>
                    <td>
                        <a href="#">{{$v->navs_name}}</a>
                    </td>
                    <td>{{$v->navs_alias}}</td>
                    <td>{{$v->navs_url}}</td>
                    <td>
                        <a href="{{url('admin/navs/'.$v->navs_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="delnavs({{$v->navs_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn_group">
                <input type="button" class="back" onclick="window.location = '{{url('admin/navs/')}}'" value="刷新">
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
function ChangeOrder(obj,navs_id){
    var navs_order = $(obj).val();
    $.post("{{url('admin/navs/changeorder')}}",{'_token':'{{csrf_token()}}','navs_id':navs_id,'navs_order':navs_order},function(data){
        if(data.status)
            layer.msg(data.msg , {icon: 5});
        else
            layer.msg(data.msg , {icon: 6});
    });
}
//删除分类
function delnavs(navs_id) {
    layer.confirm('您确定要删除这个分类吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        $.post("{{url('admin/navs')}}/"+navs_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
