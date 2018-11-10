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
                <a href="{{url('user/device/create')}}"><i class="fa fa-plus"></i>绑定设备</a>
                <a href="{{url('user/type')}}"><i class="fa fa-recycle"></i>设备管理</a>
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
                    <th>设备状态</th>
                    <th>鉴权码</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        {{$v->type_name}}
                    </td>
                    <td>
                        <a href="{{url('user/device/'.$v->dev_id)}}" title="{{$v->dev_description}}">{{$v->dev_name}}</a>
                    </td>
                    <td id="Dev{{$v->dev_id}}">离线</td>
                    <td>{{$v->dev_authcode}}</td>
                    <td>
                        <a href="{{url('user/device/'.$v->dev_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="delCate({{$v->dev_id}})">解绑</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn_group">
                <input type="button" class="back" onclick="window.location = '{{url('user/device')}}'" value="刷新">
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
refresh();

function ChangeOrder(obj,dev_id){
    var dev_order = $(obj).val();
    $.post("{{url('user/device/changeorder')}}",{'_token':'{{csrf_token()}}','dev_id':dev_id,'dev_order':dev_order},function(data){
        if(data.status)
            layer.msg(data.msg , {icon: 5});
        else
            layer.msg(data.msg , {icon: 6});
    });
}
//删除设备
function delCate(dev_id) {
    layer.confirm('您确定要解绑这个设备吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        $.post("{{url('user/device')}}/"+dev_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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

function refresh(){
    $.post("{{url('user/device/refresh')}}",{'_token':'{{csrf_token()}}','user_id':{{session('user')->user_id}}},function(data){
        $.each(data, function(index, content){
            document.getElementById("Dev"+content['dev_id']).innerHTML = content['dev_status']?'在线':'离线';
        });
    });
    setTimeout("refresh()",5000);
}
</script>
@endsection
