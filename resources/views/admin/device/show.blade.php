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
            <h3>{{$device->dev_name}}:<a href="#" id="dev">{{$device->dev_status?'在线':'离线'}}</a>　　上次更新时间：<a href="#" id="time">获取中...</a></h3>
            @if(count($data)<1)
                <div class="mark">
                        <p>您还没给设备添加变量呢！赶快来<a href="{{url('user/variate/create?d='.$device->dev_id)}}">添加</a>吧。</p>
                </div>
            @endif
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('user/variate/create?d='.$device->dev_id)}}"><i class="fa fa-plus"></i>添加变量</a>
                <a href="{{url('user/device/'.$device->dev_id)}}"><i class="fa fa-recycle"></i>设备概况</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th>变量名称</th>
                    <th>变量值</th>
                    <th>变量单位</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" onchange="ChangeOrder(this,{{$v->var_id}})" value="{{$v->var_order}}">
                    </td>
                    <td>
                        <a href="#"  title="{{$v->var_description}}">{{$v->var_name}}</a>

                    </td>
                    <td id="{{$v->var_alias}}">{!! $v->_html !!}</td>
                    <td>{{$v->var_unit}}</td>
                    <td>
                        <a href="{{url('user/variate/'.$v->var_id.'/edit')}}">修改</a>
                        <a href="javascript:" onclick="delCate({{$v->var_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn_group">
                <input type="button" class="back" onclick="window.location = '{{url('user/device/'.$device->dev_id)}}'" value="刷新">
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script type="text/javascript" src="{{asset('resources/views/user/style/js/swfobject.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/user/style/js/web_socket.js')}}"></script>
<script>
    if (typeof console == "undefined") {    this.console = { log: function (msg) {  } };}
    WEB_SOCKET_SWF_LOCATION = "{{asset('resources/views/user/style//swf/WebSocketMain.swf')}}";
    WEB_SOCKET_DEBUG = true;
    var ws;

    connect();

    // 连接服务端
    function connect() {
        // 创建websocket
        ws = new WebSocket("ws://120.25.161.28:7272");
        // 当socket连接打开时，输入用户名
        ws.onopen = onopen;
        // 当有消息时根据消息类型显示不同信息
        ws.onmessage = onmessage;
        ws.onclose = function() {
            console.log("连接关闭，定时重连");
            connect();
        };
        ws.onerror = function() {
            console.log("出现错误");
        };
    }

    // 连接建立时发送登录信息
    function onopen()
    {
        // 登录
        var login_data = '{"type":"login","client_name":"{{$device->dev_alias}}","user_key":"{{$user->user_key}}"}';
        console.log("websocket握手成功，发送登录数据:"+login_data);
        ws.send(login_data);
    }

    // 服务端发来消息时
    function onmessage(e)
    {
        var myDate = new Date();
        var mytime=myDate.toLocaleDateString()+myDate.toLocaleTimeString();
        document.getElementById("time").innerHTML = mytime;
        console.log(e.data);
        var data = eval("("+e.data+")");
        switch(data['type']){
            // 服务端ping客户端
            case 'ping':
                ws.send('{"type":"pong"}');
                break;
            // 登录 更新用户列表
            case 'login':
                //{"type":"login","client_id":xxx,"client_name":"xxx","client_list":"[...]","time":"xxx"}
                document.getElementById("dev").innerHTML = '在线';
                console.log("登录成功");
                break;
            // 发言
            case 'say':
                //{"type":"say","from_client_id":xxx,"to_client_id":"all/client_id","data":"xxx","time":"xxx"}
                document.getElementById("dev").innerHTML = '在线';
                document.getElementById("time").innerHTML = mytime;
                $.each(data.data,function(i,item){
                    document.getElementById(item['Name']).innerHTML = item['Value'];
                });
                break;
            // 用户退出 更新用户列表
            case 'logout':
                //{"type":"logout","client_id":xxx,"time":"xxx"}
                document.getElementById("dev").innerHTML = '离线';

        }
    }

    // 提交对话
    function onSubmit(obj,var_alias) {
       // var var_value = obj.id;
        var var_value = obj.value;
        ws.send('{"type":"say","data":[{"Name":"'+var_alias+'","Value":"'+var_value+'"}]}');
        //obj.value = obj.id;
       // obj.id = (obj.id==0)?1:0;

    }

function ChangeOrder(obj,var_id){
    var var_order = $(obj).val();
    $.post("{{url('user/variate/changeorder')}}",{'_token':'{{csrf_token()}}','var_id':var_id,'var_order':var_order},function(data){
        if(data.status)
            layer.msg(data.msg , {icon: 5});
        else
            layer.msg(data.msg , {icon: 6});
    });
}
//删除设备
function delCate(var_id) {
    layer.confirm('您确定要删除这个设备吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        $.post("{{url('user/variate')}}/"+var_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
