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
            <h3>设备: <a href="#" title="{{$devices->dev_description}}">{{$devices->dev_name}}</a></h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('user/type')}}"><i class="fa fa-plus"></i>设备管理</a>
                <a href="{{url('user/device/'.$devices->dev_id)}}"><i class="fa fa-recycle"></i>设备概况</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="15%">变量名称</th>
                    <th>变量值</th>
                    <th>变量单位</th>
                    <th>更新时间</th>
                </tr>
                @foreach($data->data as $v)
                    <tr>
                        <td class="tc">
                            <a href="#">{{$v->id}}</a>
                        </td>
                        <td id="value{{$v->id}}">
                            @if(isset($v->current_value))
                                {{$v->current_value}}{{$v->unit_symbol}}
                            @else
                                undefined{{$v->unit_symbol}}
                            @endif
                        </td>
                        <td>{{$v->unit}}</td>
                        <td id="time{{$v->id}}">
                            @if(isset($v->update_at))
                                {{$v->update_at}}
                            @else
                                undefined
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>
            <div class="btn_group">
                <input type="button" class="back" onclick="window.location = '{{url('user/device/'.$devices->dev_id)}}'" value="刷新">
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
    refresh();

    function refresh(){
        $.post("{{url('user/device/refresh')}}",{'_token':'{{csrf_token()}}','dev_id':'{{$devices->dev_id}}'},function(data){
            $.each(data, function(index, content){
                document.getElementById("value"+content['id']).innerHTML = content['current_value'] + content['unit_symbol'];
                document.getElementById("time"+content['id']).innerHTML = content['update_at'];
            });
        });
        setTimeout("refresh()",3000);
    }
</script>
@endsection
