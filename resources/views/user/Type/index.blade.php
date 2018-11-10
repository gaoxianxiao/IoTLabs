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
                <a href="{{url('user/device/create')}}"><i class="fa fa-plus"></i>添加设备</a>
                <a href="{{url('user/type')}}"><i class="fa fa-recycle"></i>设备管理</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>类型名称</th>
                    <th>设备数量</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td>
                        <a href="{{url('user/type/'.$v->type_id)}}" title="{{$v->type_description}}">{{$v->type_name}}</a>
                    </td>
                    <td id="">{{$v->count}}</td>
                </tr>
                @endforeach
            </table>
            <div class="btn_group">
                <input type="button" class="back" onclick="window.location = '{{url('user/type')}}'" value="刷新">
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
@endsection
