@extends('front.base.empty')

@section('style')
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.3/quill.snow.css" rel="stylesheet">
    <style>
        body{
            padding-top:70px;
        }
        .navbar{
            background-color: #ffffff;
            border:0px;
            -webkit-box-shadow: 0px 4px 8px rgba(0,0,0,0.05);
            -moz-box-shadow: 0px 4px 8px rgba(0,0,0,0.05);
            box-shadow: 0px 4px 8px rgba(0,0,0,0.05);
        }
        #editor{
            width:100%;
            min-height:400px;
        }
        .ql-toolbar.ql-snow + .ql-container.ql-snow{
            border:0px;
        }
        .ql-toolbar.ql-snow{
            padding:15px 0px;
            border-left:0px;
            border-right:0px;
            border-width:2px;
            border-color: #f2f2f2;
        }
        .ql-container{
            font-size: 14px;
            color: #333;
        }
        input.article-title-input , .article-category-select{
            border:0px;
            padding:26px 10px;
            font-size:16px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            color: #999;
            -webkit-box-shadow:     none;
            -moz-box-shadow:     none;
            box-shadow:     none;
        }
        .article-category-select{
            padding:16px;
            width:100%;
            text-align: right;
        }
        .article-label{
            width:auto;
        }
        input.article-title-input:focus ,  .article-category-select:focus{
            outline:none;
            -webkit-box-shadow:     none;
            -moz-box-shadow:     none;
            box-shadow:     none;
        }

        .fix-toolbar{
            position: fixed;
            top:60px;
            width:100%;
            left:15px;
            right:15px;
            background-color: #fff;
            z-index: 9999;
        }
    </style>
@endsection


@section('content')
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a  href="javascript:void(0);" onclick="returnback(this);" data-backurl="{{ url('/') }}">
                            <span class="fa-stack">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-reply fa-stack-1x fa-inverse"></i>
                            </span> 返回</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="javascript:void(0);" onclick="form_save()">
                            <span class="fa-stack">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-save fa-stack-1x fa-inverse"></i>
                            </span> 存为草稿</a>
                    </li>
                    <li><a href="javascript:void(0);" onclick="form_submit()">
                            <span class="fa-stack">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-upload fa-stack-1x fa-inverse"></i>
                            </span> 发布</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <form action="{{ url('blog/ajaxpublish') }}" data-save="{{ url('blog/ajaxsave') }}" method="post" class="container-fluid">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-8 col-md-8 col-lg-8">
                <div class="row">
                    <label for="title" class="col-xs-4 col-md-4 col-lg-4 article-category-select article-label">标题</label>
                    <div class="col-xs-8 col-md-8 col-lg-8">
                        <input type="text" name="title" id="title" autocomplete="off" class="form-control article-title-input" placeholder="请输入标题">
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="row">
                    <label for="category_id" class="col-md-4 article-category-select article-label">分类</label>
                    <div class="col-md-8">
                        <select name="category_id" id="category_id" class="article-category-select">
                            <option value="1">PHP</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-md-2 col-lg-2">
                <div class="row">
                    <label for="category_id" class="col-md-4 article-category-select article-label">类型</label>
                    <div class="col-md-8">
                        <select name="category_id" id="category_id" class="article-category-select">
                            <option value="o">原创</option>
                            <option value="r">转载</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="editor" name="content"></div>
        @if(isset($article))
            <input type="hidden" name="id" value="{{ $article->id }}">
        @endif

        @if(isset($type))
            <input type="hidden" name="type" value="{{ $type }}">
        @endif
    </form>
@endsection


@section('js')
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/hullabaloo.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="{{ asset('js/quill-1.3.3.js') }}"></script>
    <script src="{{ asset('js/front/edit-page.js') }}"></script>

    <script>
        $.hulla = new hullabaloo();

        quill.clipboard.dangerouslyPasteHTML('');
    </script>
@stop