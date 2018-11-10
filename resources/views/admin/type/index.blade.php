@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  产品分类
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
                <a href="{{url('admin/type/create')}}"><i class="fa fa-plus"></i>添加产品</a>
                <a href="{{url('admin/type')}}"><i class="fa fa-recycle"></i>产品列表</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">产品ID</th>
                    <th>产品名称</th>
                    <th>APIKEY</th>
                    <th>解析脚本</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="ChangeOrder(this,{{$v->type_id}})" value="{{$v->type_order}}">
                    </td>
                    <td class="tc">{{$v->type_pid}}</td>
                    <td>
                        <a href="#">{{$v->type_name}}</a>
                    </td>
                    <td>{{$v->type_apikey}}</td>
                    <td>{{$v->type_parsername}}</td>
                    <td>
                        <a href="{{url('admin/type/'.$v->type_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="delCate({{$v->type_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <br/>
            <input type="button" class="back" onclick="window.location = '{{url('admin/type/')}}'" value="刷新">
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
function ChangeOrder(obj,type_id){
    var type_order = $(obj).val();
    $.post("{{url('admin/type/changeorder')}}",{'_token':'{{csrf_token()}}','type_id':type_id,'type_order':type_order},function(data){
        if(data.status)
            layer.msg(data.msg , {icon: 5});
        else
            layer.msg(data.msg , {icon: 6});
    });
}
//删除产品
function delCate(type_id) {
    layer.confirm('您确定要删除这个产品吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        $.post("{{url('admin/type')}}/"+type_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
