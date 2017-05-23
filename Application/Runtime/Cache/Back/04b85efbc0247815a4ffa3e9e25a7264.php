<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>控制面板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    

    <link href="/laosan/Public/Back/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="/laosan/Public/Back/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="/laosan/Public/Back/stylesheet/stylesheet.css" type="text/css" rel="stylesheet" media="screen" />

    
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
                    <button type="submit" form="form-brand" data-toggle="tooltip" title="保存" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                    </button>
                    <a href="<?php echo U('list');?>" data-toggle="tooltip" title="取消" class="btn btn-default">
                        <i class="fa fa-reply"></i>
                    </a>
                </div>
                <h1>商品单位</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo U('Manage/index');?>">首页</a>
                    </li>
                    <li>
                        <a href="#">商品单位</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil"></i>
                        设置商品单位
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo U('set');?>" method="post" enctype="multipart/form-data" id="form-brand" class="form-horizontal">
                        <?php if(isset($data['unit_id'])): ?><input type="hidden" name="unit_id" value="<?php echo ($data['unit_id']); ?>" id="input-unit_id"><?php endif; ?>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab-general" data-toggle="tab">基本信息</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-general">

                                                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-title">单位标题</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="<?php echo ($data['title']); ?>" placeholder="单位标题" id="input-title" class="form-control" data-remoteurl="<?php echo U('ajax');?>"/>
                                        <?php if(isset($message['title'])): ?><label for="input-title" class="text-danger"><?php echo ($message['title']); ?></label><?php endif; ?>
                                    </div>
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


    <script src="/laosan/Public/Back/validate/jquery.validate.min.js"></script>
    <script src="/laosan/Public/Back/validate/additional-methods.min.js"></script>
    <script src="/laosan/Public/Back/validate/localization/messages_zh.min.js"></script>
    //js验证
    <script>
        $(function(){}
    </script>


</body>
</html>