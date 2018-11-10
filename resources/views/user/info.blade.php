@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('user/info')}}">首页</a> &raquo; 用户基本信息
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url('user/device/create')}}"><i class="fa fa-plus"></i>绑定设备</a>
            <a href="{{url('user/device')}}"><i class="fa fa-recycle"></i>设备列表</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->


<div class="result_wrap">
    <div class="result_title">
        <h3>用户基本信息</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>用户名</label><span>{{$user->user_name}}</span>
            </li>
            <li>
                <label>操作系统</label><span>{{$_SERVER ['HTTP_USER_AGENT']}}</span>
            </li>
            <li>
                <label>您当前IP</label><span>{{$_SERVER ['REMOTE_ADDR']}}</span>
            </li>
            <li>
                <label>北京时间</label><span><?php echo date('Y年m月d日 H时i分s秒')?></span>
            </li>
            <li>
                <label>程序版本</label><span>V-1.0</span>
            </li>
        </ul>
    </div>
</div>


<div class="result_wrap">
    <div class="result_title">
        <h3>使用帮助</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>官方交流网站：</label><span><a href="#">http://www.iotlabs.cn</a></span>
            </li>
            <li>
                <label>官方交流QQ群：</label><span><a href="#"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png"></a></span>
            </li>
        </ul>
    </div>
</div>
<!--结果集列表组件 结束-->
<script>
    //更新UserKey
    function ChangeUserKey() {
        layer.confirm('您确定要更新 UserKey 吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('user/changeuserkey')}}",{'_token':"{{csrf_token()}}"},function (data) {
                if(data.status){
                    layer.msg(data.msg, {icon: 5});
                }else{
                    document.getElementById("user_key").innerHTML = data.user_key;
                    layer.msg(data.msg, {icon: 6});
                }
            });
        }, function(){

        });
    }
</script>
@endsection

