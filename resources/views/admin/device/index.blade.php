@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('user/info')}}">首页</a> &raquo;  我的设备
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
                <a href="{{url('admin/device/create')}}"><i class="fa fa-plus"></i>添加设备</a>
                <a href="{{url('admin/device')}}"><i class="fa fa-recycle"></i>设备列表</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="10%">产品类别</th>
                    <th>设备名称</th>
                    <th>注册码</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">{{$v->type_name}}</td>
                    <td>
                        <a href="{{url('admin/device/'.$v->dev_id)}}" title="{{$v->dev_description}}">{{$v->dev_name}}</a>
                    </td>
                    <td>*{{$v->type_pid}}#{{$v->dev_authcode}}#{{$v->type_parsername}}*</td>
                    <td>
                        <a href="{{url('admin/device/'.$v->dev_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="delCate({{$v->dev_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn_group">
                <input type="button" class="back" onclick="window.location = '{{url('admin/device')}}'" value="刷新">
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>

//删除设备
function delCate(dev_id) {
    layer.confirm('您确定要删除这个设备吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        $.post("{{url('admin/device')}}/"+dev_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
