@extends('Admin.master')

@section('title','写文章')

@section('css')
    <link href="/Admin/assets/js/validate/validate.css" rel="stylesheet">
    {{--<link href="/Admin/editor/css/style.css" rel="stylesheet">--}}
    <link href="/Admin/editor/css/editormd.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Admin/assets/js/tag/jquery.tagsinput.css">
    <link rel="stylesheet" type="text/css" href="/Admin/assets/css/jquery-ui.min.css">

@endsection

@section('menu','文章管理')
@section('page','写文章')

@section('pageName','写文章')

@section('content')
    <div class="body-nest" id="element">

        <div class="panel-body">
            <form method="post" action="/article" class="form-horizontal bucket-form articleForm">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="title1">标题</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" id="title1"  class="form-control title1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="category">分类</label>
                    <div class="col-sm-6">
                        <select id="category" name="category" class="form-control category">
                            @foreach($category as $item)
                                <option value="{{$item['id']}}"> {{$item['newHtml']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="tag">标签</label>
                    <div class="col-sm-6">

                        <input type="text" name="tag" id="tag" class="form-control round-input tag">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">文章内容</label>
                    <div class="col-sm-6" id="test-editormd">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                        <button class="btn" type="submit">
                            <span class="fontawesome-save"></span>&nbsp;&nbsp;保存</button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection


@section('js')
    <script type="text/javascript" src="/Admin/assets/js/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/Admin/editor/js/editormd.min.js"></script>
    <script type="text/javascript" src="/Admin/assets/js/tag/jquery.tagsinput.js"></script>
    <script type="text/javascript" src="/Admin/assets/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="/Admin/admin.create.js"></script>
    <script>

        var testEditor;

        $(function() {
            testEditor = editormd("test-editormd", {
                width: "50%",
                height: 640,
                syncScrolling: "single",
                path: "/Admin/editor/lib/"
            });
        });

        $(function() {

            $('#tag').tagsInput({
                imageUpload : true,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : "/uploadPhotos",
                autocomplete_url:"/autoCompleteTags",

                previewTheme : "dark",
                editorTheme : "pastel-on-dark",
                markdown : 'md',
                codeFold : true,

                width: 'auto',
                height:'10px',
                defaultText:'添加标签',
                minChars:'0',
                maxChars:'20',
                placeholderColor:'#ff0066'

            });

        });


    </script>
    {!! reminder()->message() !!}
@endsection
