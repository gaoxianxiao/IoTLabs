@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('user/info')}}">首页</a> &raquo;  修改设备
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
            <h3>快捷操作</h3>
        @if(count($errors)>0)
            <div class="mark">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url('user/device/create')}}"><i class="fa fa-plus"></i>绑定设备</a>
            <a href="{{url('user/type')}}"><i class="fa fa-recycle"></i>设备管理</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('user/device/'.$field->dev_id)}}" method="post">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="user_id" value="{{$field->user_id}}">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>设备名称：</th>
                <td>
                    <input type="text" name="dev_name" value="{{$field->dev_name}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>设备名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th>设备描述：</th>
                <td>
                    <textarea name="dev_description">{{$field->dev_description}}</textarea>
                </td>
            </tr>
            <tr>
                <th>设备图片：</th>
                <td>
                    <input type="text" class="lg" name="dev_pic" value="{{$field->dev_pic}}">
                </td>
            </tr>
            <tr>
                <th>设备地址：</th>
                <td>
                    <input type="text" class="lg" name="dev_addr" value="{{$field->dev_addr}}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection

