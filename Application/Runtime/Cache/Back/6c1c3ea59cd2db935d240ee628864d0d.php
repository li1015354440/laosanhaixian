<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>控制面板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    

    <link href="/laosan/Public/Back/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="/laosan/Public/Back/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="/laosan/Public/Back/stylesheet/stylesheet.css" type="text/css" rel="stylesheet" media="screen" />

    
    <link href="/laosan/Public/Back/jqueryFileUpload/css/jquery.fileupload.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="/laosan/Public/Back/jqueryFileUpload/css/jquery.fileupload-ui.css" type="text/css" rel="stylesheet" media="screen" />


</head>
<body data-public="/laosan/Public" >
<div id="container">
    <!--header独立-->
    <header id="header" class="navbar navbar-static-top">
    <div class="navbar-header">
        <a type="button" id="button-menu" class="pull-left"> <i class="fa fa-indent fa-lg"></i>
        </a>
        <a href="" class="navbar-brand">
            <img src="/laosan/Public/Back/image/logo.png" alt="OpenCart" title="OpenCart" />
        </a>
    </div>
    <ul class="nav pull-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-life-ring fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">
                    网店名称
                    <i class="fa fa-shopping-cart"></i>
                </li>
                <li>
                    <a href="" target="_blank">Wanbaobao(商城)</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">
                    帮助
                    <i class="fa fa-life-ring"></i>
                </li>
                <li>
                    <a href="" target="_blank">技术支持</a>
                </li>
                <li>
                    <a href="" target="_blank">支持文档</a>
                </li>
                <li>
                    <a href="" target="_blank">应用商店</a>
                </li>
            </ul>
        </li>
        <li>
            <!--<a href="">-->
                <!--<span class="hidden-xs hidden-sm hidden-md">注销</span>-->
                <!--<i class="fa fa-sign-out fa-lg"></i>-->
            <!--</a>-->
        </li>
    </ul>
</header>
    <nav id="column-left">
        <!--管理员信息独立-->
        <div id="profile">
    <div>
        <!-- <i class="fa fa-opencart"></i>
      -->
        <img src="/laosan/Public/Back/image/avatar.png" style="max-width:42px; max-height: 42px;" ></div>
    <div>
        <h4>阿兵</h4>
        <small>Administrator</small>
    </div>
</div>

        <!-- 菜单独立 -->
        <ul id="menu">
    <li id="dashboard">
        <a href="">
            <i class="fa fa-dashboard fa-fw"></i>
            <span>管理首页</span>
        </a>
    </li>
    <li id="catalog">
        <a class="parent">
            <i class="fa fa-tags fa-fw"></i>
            <span>商品管理</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo U('Back/Goods/list');?>">商品列表</a>
            </li>
            <li class="">
                <a href="<?php echo U('Back/Goods/set');?>">商品添加</a>
            </li>
        </ul>
    </li>
    <li id="design">
        <a class="parent">
            <i class="fa fa-television fa-fw"></i>
            <span>商品单位</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo U('Back/Unit/list');?>">单位展示</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Unit/set');?>">单位添加</a>
            </li>
        </ul>
    </li>
    <li id="orders">
        <a class="parent">
            <i class="fa fa-puzzle-piece fa-fw"></i>
            <span>订单管理</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo U('Back/Order/list');?>">全部订单</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Order/list',['order_statu_id'=>1]);?>">未支付订单</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Order/list',['order_statu_id'=>2]);?>">未发货订单</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Order/list',['order_statu_id'=>3]);?>">未收货订单</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Order/list',['order_statu_id'=>4]);?>">已完成订单</a>
            </li>
        </ul>
    </li>
    <li id="extension">
        <a class="parent">
            <i class="fa fa-heart fa-fw"></i>
            <span>商品类型</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo U('Back/Type/set');?>">类型添加</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Type/list');?>">类型展示</a>
            </li>
        </ul>
    </li>

    <li id="extension1">
        <a class="parent">
            <i class="fa fa-film fa-fw"></i>
            <span>管理员</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo U('Back/Admin/set');?>">添加管理员</a>
            </li>
            <li>
                <a href="<?php echo U('Back/Admin/list');?>">管理员列表</a>
            </li>
        </ul>
    </li>
    <li id="reports">
        <a class="parent">
            <i class="fa fa-user fa-fw"></i>
            <span>用户留言</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo U('Back/Ask/list');?>">查看留言</a>
            </li>
        </ul>
    </li>
</ul>

        <!--状态独立-->
        <!-- <div id="stats">
    <ul>
        <li>
            <div>
                订单已经完成
                <span class="pull-right">0%</span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0%</span>
                </div>
            </div>
        </li>
        <li>
            <div>
                订单待处理
                <span class="pull-right">0%</span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0%</span>
                </div>
            </div>
        </li>
        <li>
            <div>
                其它状态
                <span class="pull-right">0%</span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0%</span>
                </div>
            </div>
        </li>
    </ul>
</div> -->
    </nav>
    
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" form="form-goods" data-toggle="tooltip" title="保存" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                    </button>
                    <a href="<?php echo U('list');?>" data-toggle="tooltip" title="取消" class="btn btn-default">
                        <i class="fa fa-reply"></i>
                    </a>
                </div>
                <h1>商品管理</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo U('Manage/index');?>">首页</a>
                    </li>
                    <li>
                        <a href="#">商品管理</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil"></i>
                        设置商品
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo U('set');?>" method="post" enctype="multipart/form-data" id="form-goods" class="form-horizontal" autocomplete="off">
                        <?php if(isset($data['goods_id'])): ?><input type="hidden" name="goods_id" value="<?php echo ($data['goods_id']); ?>" id="input-goods_id"><?php endif; ?>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab-general" data-toggle="tab">基本信息</a>
                            </li>
                            <li>
                                <a href="#tab-image" data-toggle="tab">添加相册</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-general">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-name">商品名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="<?php echo ($data['name']); ?>" placeholder="商品名称" id="input-name" class="form-control" data-remoteurl="<?php echo U('ajax');?>"/>
                                        <?php if(isset($message['name'])): ?><label id="tishi" for="input-name" class="text-danger"><?php echo ($message['name']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-type_id">类型</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="type_id" id="input-type_id" >
                                            <option value="">--请选择--</option>
                                            <?php if(is_array($goods_type)): $i = 0; $__LIST__ = $goods_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type['type_id']); ?>"
                                                <?php if($data['type_id'] === $type['type_id']): ?>selected<?php endif; ?>>
                                                <?php echo ($type['title']); ?>
                                                </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <?php if(isset($message['type_id'])): ?><label for="input-type_id" class="text-danger"><?php echo ($message['type_id']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-is_online">是否上架</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="is_online" id="input-is_online" >
                                        <option value="1" <?php if($data['is_online'] == 1): ?>selected<?php endif; ?>>
                                        是
                                        </option>
                                        <option value="0" <?php if($data['is_online'] === 0): ?>selected<?php endif; ?>>
                                        否
                                        </option>
                                    </select>
                                    <?php if(isset($message['type_id'])): ?><label for="input-type_id" class="text-danger"><?php echo ($message['is_online']); ?></label><?php endif; ?>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-shop_price">商品价格</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="shop_price" value="<?php echo ($data['shop_price']); ?>" placeholder="商品价格" id="input-shop_price" class="form-control"/>
                                        <?php if(isset($message['shop_price'])): ?><label for="input-shop_price" class="text-danger"><?php echo ($message['shop_price']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-is_hot">是否热销</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="is_hot" id="input-is_hot" >
                                            <option value="0" <?php if($data['is_hot'] === 0): ?>selected<?php endif; ?>>
                                            否
                                            </option>
                                            <option value="1" <?php if($data['is_hot'] == 1): ?>selected<?php endif; ?>>
                                            是
                                            </option>
                                        </select>
                                        <?php if(isset($message['type_id'])): ?><label for="input-type_id" class="text-danger"><?php echo ($message['is_hot']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-stock">库存</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="stock" value="<?php echo ($data['stock']); ?>" placeholder="库存" id="input-stock" class="form-control" />
                                        <?php if(isset($message['stock'])): ?><label for="input-name" class="text-danger"><?php echo ($message['stock']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-unit_id">单位</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="unit_id" id="input-unit_id" >
                                            <option value="">--请选择--</option>
                                            <?php if(is_array($goods_unit)): $i = 0; $__LIST__ = $goods_unit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$unit): $mod = ($i % 2 );++$i;?><option value="<?php echo ($unit['unit_id']); ?>"
                                                <?php if($data['unit_id'] === $unit['unit_id']): ?>selected<?php endif; ?>>
                                                <?php echo ($unit['title']); ?>
                                                </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <?php if(isset($message['unit_id'])): ?><label for="input-unit_id" class="text-danger"><?php echo ($message['unit_id']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-name">商品排序</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sort_number" value="<?php echo ($data['sort_number']); ?>" placeholder="商品排序" id="input-sort_number" class="form-control" data-remoteurl="<?php echo U('ajax');?>"/>
                                        <?php if(isset($message['sort_number'])): ?><label for="input-sort_number" class="text-danger"><?php echo ($message['sort_number']); ?></label><?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-image">原始图像</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="image" id="input-image-value" value="<?php echo ($data['image']); ?>">
                                        <input type="hidden" name="thumb" id="input-image_thumb-value" value="<?php echo ($data['thumb']); ?>">
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>添加商品主图</span>
                                            <!-- The file input field used as target for the file upload widget -->
                                            <input id="input-image" name="image" type="file" data-uploadurl="<?php echo U('upload');?>">
                                        </span>
                                        <?php if(isset($message['image'])): ?><label for="input-image" class="text-danger"><?php echo ($message['image']); ?></label><?php endif; ?>
                                    </div>
                                    <div class="class-sm-4">
                                        <img src="/laosan/Public/Thumb/<?php echo ($data['thumb']); ?>" alt="" id="image-show" class="img-thumbnail" style="max-height: 50px;<?php if( $data['thumb'] == ''): ?>display:none;<?php endif; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-image">描述图</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="description" id="input-description-value" value="<?php echo ($data['description']); ?>">
                                        <input type="hidden" name="des_thumb" id="input-description_thumb-value" value="<?php echo ($data['des_thumb']); ?>">
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>添加商品描述</span>
                                            <!-- The file input field used as target for the file upload widget -->
                                            <input id="input-image-description" name="description" type="file" data-uploadurl="<?php echo U('upload',['type'=>'description']);?>">
                                        </span>
                                        <?php if(isset($message['description'])): ?><label for="input-image" class="text-danger"><?php echo ($message['image']); ?></label><?php endif; ?>
                                    </div>
                                    <div class="class-sm-4">
                                        <img src="/laosan/Public/Thumb/<?php echo ($data['des_thumb']); ?>" alt="" id="show-description" class="img-thumbnail" style="max-height: 50px; <?php if($data['des_thumb'] == ''): ?>display:none;<?php endif; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-image">
                                <div class="table-responsive">
                                    <table id="table-galleries" class="table table-striped table-bordered table-hover"
                                           data-removeurl="<?php echo U('remove');?>">
                                        <thead>
                                        <tr>
                                            <td class="text-left">图片</td>
                                            <td class="text-right">排序</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($gallery_list)): $i = 0; $__LIST__ = $gallery_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gallery): $mod = ($i % 2 );++$i;?><tr id="image-row-<?php echo ($key); ?>">
                                                <td class="text-left">
                                                    <input type="hidden" name="galleries[<?php echo ($key); ?>][gallery_id]"
                                                           value="<?php echo ($gallery['gallery_id']); ?>">
                                                    <img src="/laosan/Public/Thumb/<?php echo ($gallery['thumb_path']); ?>" width="100" height="90" alt="NO-IMG" title="相册图片">
                                                </td>
                                                <td class="text-right">
                                                    <input name="galleries[<?php echo ($key); ?>][sort_number]"
                                                           value="<?php echo ($gallery['sort_number']); ?>" placeholder="排序"
                                                           class="form-control valid" aria-invalid="false" type="text">
                                                </td>
                                                <td class="text-left">
                                                    <button type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-danger remove-button"
                                                            data-original-title="移除"
                                                            data-gallery_id="<?php echo ($gallery['gallery_id']); ?>"><i
                                                            class="fa fa-minus-circle"></i></button>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>选择图片</span>
                                                            <input id="input-galleries" name="galleries" type="file"
                                                                   multiple
                                                                   data-uploadurl="<?php echo U('upload', ['type'=>'gallery']);?>">
                                                    </span>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--footer独立-->
    <footer id="footer">
    <a href="">BaoBaoWan(商城shoping)</a>
    <br>
    &copy; 2009-2016 All Rights Reserved.
    <br>Version 1.0
</footer>
</div>

<script type="text/javascript" src="/laosan/Public/Back/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/laosan/Public/Back/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/laosan/Public/Back/javascript/common.js"></script>


    <script src="/laosan/Public/Back/jqueryFileUpload/js/vendor/jquery.ui.widget.js"></script>
    <script src="/laosan/Public/Back/jqueryFileUpload/js/jquery.fileupload.js"></script>
    <script src="/laosan/Public/Back/validate/jquery.validate.min.js"></script>
    <script src="/laosan/Public/Back/validate/additional-methods.min.js"></script>
    <script src="/laosan/Public/Back/validate/localization/messages_zh.min.js"></script>
    <script>
        $(function () {
            $('#form-goods').validate({
                rules:{
                    name:{
                        remote:{
                            url:$('#input-name').data('remoteurl'),
                            data:{
                              goods_id:$('#input-goods_id').val(),
                            },
                        }
                    }
                },
                messages:{
                    name:{
                        remote:'商品名已存在',
                    },
                },
                debug: false,
                submitHandler: function(form) {
                    form.submit();
                },
                errorClass:'text-danger',
            });
        });
    </script>
    <script>
        //商品主图的上传
        $(function() {
//            alert($('#input-image').data('uploadurl'));
            $('#input-image').fileupload({
                // 负责完成动作
                url: $('#input-image').data('uploadurl'),
                dataType: 'json',
                // 上传成功后, 回调的函数,
                done: function(evt, response) {
                    var data = response.result;
                    if(0 === data.error) {
                        // 将图像反显
                        $('#image-show').attr('src', $('body').data('public') + '/Thumb/' + data.image_thumb).show();
                        $('#input-image-value').val(data.image);
                        $('#input-image_thumb-value').val(data.image_thumb);
                    }
                }
            });
        })
    </script>
    <script>
        //商品描述图的上传
        $(function() {
            $('#input-image-description').fileupload({
                // 负责完成动作
                url: $('#input-image-description').data('uploadurl'),
                dataType: 'json',
                // 上传成功后, 回调的函数,
                done: function(evt, response) {
                    var data = response.result;
                    if(0 === data.error) {
                        // 将图像反显
                        $('#show-description').attr('src', $('body').data('public') + '/Thumb/' + data.image_thumb).show();
                        $('#input-description-value').val(data.image);
                        $('#input-description_thumb-value').val(data.image_thumb);
                    }
                }
            });
        })
    </script>
    <script>
        $(function () {
            //移除事件绑定
            $('#table-galleries').delegate('button.remove-button', 'click', function (evt) {
                var currButton = $(this);
                // ajax 删除服务器上的记录和图像资源
                var url = $('#table-galleries').data('removeurl');
                var data = {
                    gallery_id: currButton.data('gallery_id'), // undefined / null
                    image_small: currButton.data('image_thumb')
                };
                $.post(url, data, function (response) {
                    // 删除所在的行
                    currButton.parents('tr').remove();
                }, 'json');
                evt.preventDefault();
            });

            // 初始化一个变量
            var galleryIndex = $('#table-galleries>tbody>tr').size();
            $('#input-galleries').fileupload({
                url: $('#input-galleries').data('uploadurl'),
                datatype: 'json',
                done: function(evt, response)
                {
                    var data = response.result;
                    if (data.error === 0) {
                        // 没出错完成反显
                        var html = '<tr id="image-row-' + galleryIndex +
                                '">' +
                                '<td class="text-left">' +
                                '<input type="hidden" name="galleries[' + galleryIndex +
                                '][image]" value="' + data.image +
                                '">' +
                                '<input type="hidden" name="galleries[' + galleryIndex +
                                '][thumb_path]" value="' + data.image_thumb +
                                '">' +
                                '<img src="' + $('body').data('public') + '/Thumb/' + data.image_thumb +
                                '" width="100" height="90" alt="NO-IMG" title="">' +
                                '</td>' +
                                '<td class="text-right">' +
                                '<input name="galleries[' + galleryIndex +
                                '][sort_number]" value="0" placeholder="排序" class="form-control" type="text">' +
                                '</td>' +
                                '<td class="text-left">' +
                                '<button type="button" data-toggle="tooltip" title="移除" class="btn btn-danger remove-button" ><i class="fa fa-minus-circle"></i></button>' +
                                '</td>' +
                                '</tr>';
                        $('#table-galleries>tbody').append(html);

                        // 索引递增
                        ++ galleryIndex;
                    }
                }
            });
        });
    </script>
    <script>

    </script>

</body>
</html>