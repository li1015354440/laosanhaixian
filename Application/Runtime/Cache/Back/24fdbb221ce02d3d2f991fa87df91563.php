<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>生产代码-配置表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <link href="/laosan/Public/Back/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <form action="<?php echo U('set');?>" method="post" enctype="multipart/form-data" id="form-code" class="form-horizontal">
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-table">表</label>
                <div class="col-sm-8">
                    <input type="text" name="table" value="" placeholder="表名" id="input-table" class="form-control"/>
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-comment">备注</label>
                <div class="col-sm-8">
                    <input type="text" name="comment" value="" placeholder="中文" id="input-comment" class="form-control"/>
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-table">操作</label>
                <div class="col-sm-8">
                    <input type="button" id="input-field" value="配置字段" class="form-control" data-confurl="<?php echo U('ajax');?>"/>
                </div>
            </div>

            <div class="row" id="row-fieldHead">
                <div class="col-sm-2 text-right">字段</div>
                <div class="col-sm-2">备注</div>
                <div class="col-sm-2 text-center">列表</div>
                <div class="col-sm-2 text-center">排序</div>
                <div class="col-sm-2 text-center">设置</div>
            </div>

            <div class="form-group required">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <input type="submit" id="input-submit" value="生成" class="form-control"/>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </form>
    </div>
    <script src="/laosan/Public/Back/jquery/jquery-2.1.1.min.js"></script>
    <script>
        $(function(){
            $('#input-field').click(function(){
                var url = $(this).data('confurl');
                var data = {table:$('#input-table').val()};
               $.get(url,data,function(response){
                   var html = '';
                   $.each(response.fields,function (i,field) {
                       html += '<div class="row">' +
                               '<input type="hidden" name="fields['+field+'][name]" value="'+field+'">' +
                               '<label class="col-sm-2 control-label" for="input-table">'+field;
                       if (field == response.pk_field) html +='(PK)';
                       html += '</label>' +
                               '<div class="col-sm-2">' +
                               '<input type="text" value="" name="fields['+field+'][comment]" class="form-control">' +
                               '</div>' +
                               '<div class="col-sm-2">' +
                               '<input type="checkbox" name="fields['+field+'][list]" value="1" class="form-control">' +
                               '</div>' +
                               '<div class="col-sm-2">' +
                               '<input type="checkbox" name="fields['+field+'][sort]" value="1" class="form-control">' +
                               '</div>' +
                               '<div class="col-sm-2">' +
                               '<input type="checkbox" name="fields['+field+'][set]" value="1" class="form-control">' +
                               '</div>' +
                               '</div>';
                   });
                   $('#row-fieldHead').after(html);
               },'json');
            });
        });
    </script>
</body>
</html>