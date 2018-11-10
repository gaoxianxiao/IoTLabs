@extends('layouts.user')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  修改产品
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
            <a href="{{url('admin/type/create')}}"><i class="fa fa-plus"></i>添加产品</a>
            <a href="{{url('admin/type')}}"><i class="fa fa-recycle"></i>产品列表</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/type/'.$field->type_id)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th>产品名称：</th>
                <td>
                    <input type="text" name="type_name" value="{{$field->type_name}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>产品名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th>产品ID：</th>
                <td>
                    <input type="text" name="type_pid" value="{{$field->type_pid}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>产品ID必须填写</span>
                </td>
            </tr>
            <tr>
                <th>APIKEY：</th>
                <td>
                    <input type="text" name="type_apikey" value="{{$field->type_apikey}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>APIKEY必须填写</span>
                </td>
            </tr>
            <tr>
                <th>解析脚本：</th>
                <td>
                    <input type="text" name="type_parsername" value="{{$field->type_parsername}}">
                    <span><i class="fa fa-exclamation-circle yellow"></i>解析脚本必须填写</span>
                </td>
            </tr>
            <tr>
                <th> 产品描述：</th>
                <td>
                    <textarea name="type_description">{{$field->type_description}}</textarea>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>排序：</th>
                <td>
                    <input type="text" class="sm" name="type_order" value="{{$field->type_order}}">
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

