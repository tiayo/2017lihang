@extends('manage.layouts.app')

@section('title', '会员管理')

@section('style')
    @parent
@endsection

@section('breadcrumb')
    <li navValue="nav_4"><a href="#">商户管理</a></li>
    <li navValue="nav_4_2"><a href="#">添加商户</a></li>
@endsection

@section('body')
    <div class="col-md-12">

        <!--错误输出-->
        <div class="form-group">
            <div class="alert alert-danger fade in @if(!count($errors) > 0) hidden @endif" id="alert_error">
                <a href="#" class="close" data-dismiss="alert">×</a>
                <span>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </span>
            </div>
        </div>

        <section class="panel">
            <header class="panel-heading">
                添加商户
            </header>
            <div class="panel-body">
                <form id="form" class="form-horizontal adminex-form" enctype="multipart/form-data" method="post" action="{{ $url }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="col-sm-2 col-sm-2 control-label">登录账号</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" id="email" placeholder="填写邮箱" name="email"
                                   value="{{ $old_input['email'] }}" @if($sign=='update') disabled @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-sm-2 control-label">姓名</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $old_input['name'] }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="col-sm-2 col-sm-2 control-label">头像</label>
                        <div class="col-sm-3">
                            <input type="file" id="avatar" name="avatar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 col-sm-2 control-label">电话</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $old_input['phone'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-2 col-sm-2 control-label">地址</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $old_input['address'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 col-sm-2 control-label">密码</label>
                        <div class="col-sm-3">
                            {{--避免自动填充--}}
                            <input type="password" id="old_password" name="password" class="hidden" disabled>
                            {{--有输入时才填入name--}}
                            <input type="password" class="form-control" id="password" autoComplete="off" placeholder="放空则使用默认值或不做修改">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 col-sm-2 control-label">类型</label>
                        <div class="col-sm-3">
                            <select class="form-control m-bot15" id="type" name="type" required>
                                @if(isset($old_input['type']))
                                    <option value="{{ $old_input['type'] }}">{{ config('site.user_type')[$old_input['type']] }}</option>
                                @endif

                                @foreach(config('site.user_type') as $key => $user_type)
                                    <option value="{{ $key }}">{{ $user_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group" class="col-sm-2 col-sm-2 control-label">分组</label>
                        <div class="col-sm-3">
                            <select class="form-control m-bot15" id="group" name="group" required>
                                @if(isset($old_input['group']))
                                    <option value="{{ $old_input['group'] }}">{{ config('site.user_group')[$old_input['group']] }}</option>
                                @endif

                                @foreach(config('site.user_group') as $key => $user_type)
                                    <option value="{{ $key }}">{{ $user_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div  class="col-sm-2 col-sm-2 control-label">
                            <button class="btn btn-success" type="submit"><i class="fa fa-cloud-upload"></i> 确认提交</button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    </div>
@endsection

@section('script')
    @parent
    <script>
        $(document).ready(function () {
            $('#password').bind('input propertychange', function() {
                $(this).attr('name', 'password')
            })
        })
    </script>
@endsection
