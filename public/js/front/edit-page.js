/* 编辑器操作条选项 */
var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'], //开关按钮
    ['blockquote', 'code-block'],
    [{'header': 1}, {'header': 2}], //自定义按钮值
    [{'list': 'ordered'}, {'list': 'bullet'}],
    [{'script': 'sub'}, {'script': 'super'}], // 上标/下标
    [{'indent': '-1'}, {'indent': '+1'}], // 减少缩进/缩进
    [{'direction': 'rtl'}], // 文本方向
    [{'size': ['small', false, 'large', 'huge']}], // 自定义下拉
    [{'header': [1, 2, 3, 4, 5, 6, false]}],
    [{'color': []}, {'background': []}], //使用主题的默认下拉
    [{'font': []}],
    [{'align': []}],
    ['clean'], //移除格式化
    ['image'],
    ['video'],
];

var quill = new Quill('#editor', {
    modules: {
        syntax: true,  //高亮；需要加载cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js
        toolbar:toolbarOptions  //指定编辑器操作条
    },
    theme: 'snow',
    readOnly: false,
    placeholder:"请输入内容..."
});



$('#editor').click(function () {
    quill.focus();
});


$(window).ready(function () {
    $('.ql-bold').attr('title' , '加粗');
    $('.ql-italic').attr('title' , '斜体');
    $('.ql-underline').attr('title' , '下划线');
    $('.ql-strike').attr('title' , '删除线');
    $('.ql-blockquote').attr('title' , '引用');
    $('.ql-code-block').attr('title' , '代码');
    $('.ql-header[value="1"]').attr('title' , '一级标题');
    $('.ql-header[value="2"]').attr('title' , '二级标题');
    $('.ql-list[value="ordered"]').attr('title' , '有序列表');
    $('.ql-list[value="bullet"]').attr('title' , '无序列表');
    $('.ql-script[value="sub"]').attr('title' , '下标');
    $('.ql-script[value="super"]').attr('title' , '上标');
    $('.ql-indent[value="-1"]').attr('title' , '减少缩进');
    $('.ql-indent[value="+1"]').attr('title' , '增加缩进');
    $('.ql-direction[value="rtl"]').attr('title' , '靠左或靠右');
    $('.ql-size').attr('title' , '字体大小');
    $('.ql-header').attr('title' , '标题');
    $('.ql-color').attr('title' , '字体颜色');
    $('.ql-background').attr('title' , '字体背景');
    $('.ql-font').attr('title' , '字体');
    $('.ql-align').attr('title' , '位置');
    $('.ql-clean').attr('title' , '清除格式');
    $('.ql-image').attr('title' , '插入图片');
    $('.ql-video').attr('title' , '插入视频');
});

$(window).scroll(function () {
    var scroll_dis = $(window).scrollTop();
    if(scroll_dis >= 60){
        $('.ql-toolbar').addClass('fix-toolbar');
    }else{
        $('.ql-toolbar').removeClass('fix-toolbar');
    }
});


function returnback(_obj) {
    if(confirm('内容将不会保存，确定继续返回吗？')){
        window.location.href = $(_obj).data('backurl');
    }
}

function form_data() {
    var _content = $('.ql-editor').html();
    var _title = $("input[name='title']").val();
    var _category_id = $("select[name='category_id'] option:selected").val();
    var _id = $("input[name='id']").val();
    var _type = $("input[name='type']").val();
    var _token = $("input[name='_token']").val();
    var _data = {};
    if(_id){
        _data = {
            'title' : _title,
            'category_id' : _category_id,
            'content' : _content,
            'id' : _id,
            'type' : _type,
            '_token' : _token
        }
    }else{
        _data = {
            'title' : _title,
            'category_id' : _category_id,
            'content' : _content,
            'type' : _type,
            '_token' : _token
        }
    }
    return _data;
}

function form_save() {
    var _save_url = $("form").data('save');
    var _data = form_data();
    $.ajax({
        data:_data,
        url: _save_url,
        type:"post",
        dataType:"json",
        beforeSend:function () {
            $.hulla.send('保存中', 'info');
        },
        success:function (rst) {
            if(rst.code == 0){
                $.hulla.send(rst.message, 'success');
            }else{
                $.hulla.send(rst.message, 'danger');
            }
        },
        error:function (e) {
            $.hulla.send('保存失败', 'danger')
        }
    })
}