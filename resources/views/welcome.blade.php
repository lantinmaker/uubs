@extends('front.base.empty')

@section('style')
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/front/common.css') }}">
@stop

@section('content')

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" style="width: 40px;" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    @if(Route::has('login'))
                        @auth
                            <li><a href="">HOME</a></li>
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="">登录</a></li>
                            <li><a href="">注册</a></li>
                        @endauth
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

    <div class="container welcome-page">
        <div class="row">
            <div class="col-md-1 col-lg-1 list-mock">
                <div class="panel">
                    <div class="panel-body" style="padding: 10px;">
                        <ul class="list-group">
                            <a class="list-group-item active" href="">推荐</a></a>
                            <a class="list-group-item" href="">热点</a>
                            <a class="list-group-item" href="">经济学</a></a>
                            <a class="list-group-item" href="">哲学</a></li>
                            <a class="list-group-item" href="">计算机</a></li>
                            <a class="list-group-item" href="">计算机</a></li>
                            <a class="list-group-item" href="">计算机</a></li>
                            <a class="list-group-item" href="">计算机</a></li>
                            <a class="list-group-item" href="">计算机</a></li>
                            <a class="list-group-item" href="">更多</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 articles">
                <div class="panel">
                    <div class="panel-body">
                        <div class="panel-article-info">
                            <h1>
                                <a href="">
                                    CSS calc() 函数 | 菜鸟教程
                                </a>
                            </h1>
                            <p>
                                <span>
                                    <a href="" class="label label-default">互联网技术</a>
                                </span>
                                <span><i class="fa fa-fw fa-user"></i> <a href="">user</a></span>
                                <span><i class="fa fa-fw fa-comment"></i> <a href="">25</a></span>
                                <span><i class="fa fa-fw fa-clock-o"></i> 25分钟前</span>
                                <span>
                                    <a href="">
                                        <i class="fa fa-fw fa-star-o"></i>
                                    </a>
                                </span>
                                <label class="pull-right">
                                    <a href="">
                                        <i class="fa fa-fw fa-close"></i>
                                    </a>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <div class="panel-article-info">
                            <h1>
                                <a href="">
                                    CSS calc() 函数 | 菜鸟教程
                                </a>
                            </h1>
                            <p>
                                <span>
                                    <a href="" class="label label-default">互联网技术</a>
                                </span>
                                <span><i class="fa fa-fw fa-user"></i> <a href="">user</a></span>
                                <span><i class="fa fa-fw fa-comment"></i> <a href="">25</a></span>
                                <span><i class="fa fa-fw fa-clock-o"></i> 25分钟前</span>
                                <span>
                                    <a href="">
                                        <i class="fa fa-fw fa-star-o"></i>
                                    </a>
                                </span>
                                <label class="pull-right">
                                    <a href="">
                                        <i class="fa fa-fw fa-close"></i>
                                    </a>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <div class="panel-article-info">
                            <h1>
                                <a href="">
                                    CSS calc() 函数 | 菜鸟教程
                                </a>
                            </h1>
                            <p>
                                <span>
                                    <a href="" class="label label-default">互联网技术</a>
                                </span>
                                <span><i class="fa fa-fw fa-user"></i> <a href="">user</a></span>
                                <span><i class="fa fa-fw fa-comment"></i> <a href="">25</a></span>
                                <span><i class="fa fa-fw fa-clock-o"></i> 25分钟前</span>
                                <span>
                                    <a href="">
                                        <i class="fa fa-fw fa-star-o"></i>
                                    </a>
                                </span>
                                <label class="pull-right">
                                    <a href="">
                                        <i class="fa fa-fw fa-close"></i>
                                    </a>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <div class="panel-article-info">
                            <h1>
                                <a href="">
                                    CSS calc() 函数 | 菜鸟教程
                                </a>
                            </h1>
                            <p>
                                <span>
                                    <a href="" class="label label-default">互联网技术</a>
                                </span>
                                <span><i class="fa fa-fw fa-user"></i> <a href="">user</a></span>
                                <span><i class="fa fa-fw fa-comment"></i> <a href="">25</a></span>
                                <span><i class="fa fa-fw fa-clock-o"></i> 25分钟前</span>
                                <span>
                                    <a href="">
                                        <i class="fa fa-fw fa-star-o"></i>
                                    </a>
                                </span>
                                <label class="pull-right">
                                    <a href="">
                                        <i class="fa fa-fw fa-close"></i>
                                    </a>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <div class="panel-article-info">
                            <h1>
                                <a href="">
                                    CSS calc() 函数 | 菜鸟教程
                                </a>
                            </h1>
                            <p>
                                <span>
                                    <a href="" class="label label-default">互联网技术</a>
                                </span>
                                <span><i class="fa fa-fw fa-user"></i> <a href="">user</a></span>
                                <span><i class="fa fa-fw fa-comment"></i> <a href="">25</a></span>
                                <span><i class="fa fa-fw fa-clock-o"></i> 25分钟前</span>
                                <span>
                                    <a href="">
                                        <i class="fa fa-fw fa-star-o"></i>
                                    </a>
                                </span>
                                <label class="pull-right">
                                    <a href="">
                                        <i class="fa fa-fw fa-close"></i>
                                    </a>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel">
                    <div class="panel-body">
                        <form class="row">
                            <div class="col-md-9">
                                <div class="form-group" style="margin-bottom: 0px;">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default">搜索</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel">

                    <div class="panel-heading">
                        <span>热门话题</span>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stop