@extends('layouts.user')
@section('content')
<!--头部 开始-->
<div class="top_box">
	<div class="top_left">
		<div class="logo">设备管理中心</div>
		<ul>
			<li><a href="{{url('/')}}" class="active">首页</a></li>
			<li><a href="{{url('/user/')}}">管理中心</a></li>
		</ul>
	</div>
	<div class="top_right">
		<ul>
			<li>用户：{{session('user')->user_name}}</li>
			<li><a href="{{url('user/pass')}}" target="main">修改密码</a></li>
			<li><a href="{{url('user/quit')}}">退出</a></li>
		</ul>
	</div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box">
	<ul>
		<li>
			<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
			<ul class="sub_menu">
				<li><a href="{{url('/user/type')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>设备管理</a></li>
				<li><a href="{{url('/user/device/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>绑定设备</a></li>
			</ul>
		</li>
		<li>
			<h3><i class="fa fa-fw fa-cog"></i>个人设置</h3>
			<ul class="sub_menu">
				<li><a href="{{url('user/pass')}}" target="main"><i class="fa fa-fw fa-cubes"></i>修改密码</a></li>
				<li><a href="{{url('user/info')}}" target="main"><i class="fa fa-fw fa-database"></i>个人信息</a></li>
			</ul>
		</li>
	</ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
	<iframe src="{{url('user/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
	CopyRight © 2016. Powered By <a href="http://www.iotlabs.cn">http://www.iotlabs.cn</a>.
</div>
<!--底部 结束-->
@endsection
