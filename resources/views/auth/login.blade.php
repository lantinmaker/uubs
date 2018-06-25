@extends('auth.base')

@section('style')
    <style type="text/css">
        body{
            background-color: #ffffff;
            background-image: url("{{ asset('images/login-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color:#555555;
        }
        a , .btn-link{
            color: #555555;
        }
        
        .btn:focus{
            -webkit-box-shadow:     none;
            -moz-box-shadow:     none;
            box-shadow:     none;
            outline: none;
        }

        .btn-primary-line{
            color:#ffffff;
            border:none;
            background-color: #f8d800;
        }
        .btn-primary-line:hover{
            color:#ffffff;
            background-color: #f8d800;
        }
        .btn-primary-line:focus , .btn-primary-line:active{
            background-color: #f8d800;
            outline: none;
            -webkit-box-shadow:     none;
            -moz-box-shadow:     none;
            box-shadow:     none;
        }

        .panel{
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow:none;
            -moz-box-shadow:none;
            box-shadow:none;
        }
        .absolute{
            width: 360px;
            position: fixed;
            top:0px;
            bottom:0px;
            right:0px;
            margin:0px;

        }
        .absolute .panel-body{
            padding:70px 20px;
        }
        .word-box{
            position: relative;
            padding-top:80px;
        }
        .famous{
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            border:3px solid #ffffff;
            position: absolute;
            top:-50px;
            overflow: hidden;
            left:50%;
            margin-left:-50px;
            -webkit-box-shadow:  0px -4px 4px rgba(0,0,0,0.15);
            -moz-box-shadow:  0px -4px 4px rgba(0,0,0,0.15);
            box-shadow:  0px -4px 4px rgba(0,0,0,0.15);
            background-color: #ffffff;
        }
        .famous img{
            width:100px;
            height:100px;
        }
        .login-types{
            padding:10px 0px;
        }
        a.login-type{
            display: inline-block;
            color:#f8d800;
            width:30px;
            height:30px;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            line-height:26px;
            border:2px solid #f8d800;
        }
        a.login-type:hover{
            background: #f8d800;
            color:#ffffff;
        }

        .footer{
            position: absolute;
            width:100%;
            bottom:10px;
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <div class="panel absolute">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="word-box">
                            <div class="famous">
                                <img src="{{ asset('images/logo-orange.png') }}" alt="">
                            </div>
                            <div class="slogn">
                                <p>Recode & Share & Study</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                            <form action="" method="post">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-sm-12 col-form-label text-left"><i class="fa fa-fw fa-envelope"></i> 邮箱</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label text-left"><i class="fa fa-fw fa-lock"></i> 密码</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('保持登录') }}
                                            </label>
                                        </div>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('忘记密码?') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary-line btn-block">
                                            {{ __('登录') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>或选择以下方式登录</p>
                                </div>
                            </div>
                            <div class="row login-types">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="row">
                                        <div class="col-xs-4 col-md-4 col-lg-4">
                                            <a href="" class="login-type">
                                                <i class="fa fa-qq"></i>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 col-md-4 col-lg-4">
                                            <a href="" class="login-type">
                                                <i class="fa fa-wechat"></i>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 col-md-4 col-lg-4">
                                            <a href="" class="login-type">
                                                <i class="fa fa-weibo"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="row text-center">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <p><i class="fa fa-fw fa-copyright"></i> {{ date('Y') }} UUBS.net</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
