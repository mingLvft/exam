<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\index\index.html";i:1571123692;}*/ ?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>后台登录-X-admin2.2</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="/static/admin/css/font.css">
        <link rel="stylesheet" href="/static/admin/css/xadmin.css">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            // 是否开启刷新记忆tab功能
            // var is_remember = false;
        </script>
    </head>
    <body class="index">
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="./index.html">X-admin v2.2</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            <ul class="layui-nav left fast-add" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">+新增</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('最大化','http://www.baidu.com','','',true)">
                                <i class="iconfont">&#xe6a2;</i>弹出最大化</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出自动宽高','http://www.baidu.com')">
                                <i class="iconfont">&#xe6a8;</i>弹出自动宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出指定宽高','http://www.baidu.com',500,300)">
                                <i class="iconfont">&#xe6a8;</i>弹出指定宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开','member-list.html')">
                                <i class="iconfont">&#xe6b8;</i>在tab打开</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开刷新','member-del.html',true)">
                                <i class="iconfont">&#xe6b8;</i>在tab打开刷新</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo \think\Cookie::get('username'); ?></a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('个人信息','http://www.baidu.com')">个人信息</a></dd>
                        <dd>
                            <a onclick="xadmin.open('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
                        <dd>
                            <a href="<?php echo url('Login/logout'); ?>">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="/">前台首页</a></li>
            </ul>
        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="学生管理">&#xe6b8;</i>
                            <cite>学生管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('学生列表','<?php echo url('Students/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>学生列表</cite></a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a onclick="xadmin.add_tab('学生回收站','<?php echo url('Students/trash'); ?>')">
                                                    <i class="iconfont">&#xe6a7;</i>
                                                    <cite>学生回收站</cite></a>
                                            </li>
                                        </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="题库">&#xe723;</i>
                            <cite>题库</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('单选题','<?php echo url('Single/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>单选题</cite></a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a onclick="xadmin.add_tab('单选题回收站','<?php echo url('Single/trash'); ?>')">
                                                    <i class="iconfont">&#xe6a7;</i>
                                                    <cite>单选题回收站</cite></a>
                                            </li>
                                        </ul>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('多选题','<?php echo url('Selection/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>多选题</cite></a>
                                        <ul class="sub-menu">
                                        <li>
                                            <a onclick="xadmin.add_tab('多选题回收站','<?php echo url('Selection/trash'); ?>')">
                                                <i class="iconfont">&#xe6a7;</i>
                                                <cite>多选题回收站</cite></a>
                                        </li>
                                        </ul>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('判断题','<?php echo url('Judge/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>判断题</cite></a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a onclick="xadmin.add_tab('判断题回收站','<?php echo url('Judge/trash'); ?>')">
                                                    <i class="iconfont">&#xe6a7;</i>
                                                    <cite>判断题回收站</cite></a>
                                            </li>
                                        </ul>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('操作题','<?php echo url('Operation/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>操作题</cite></a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a onclick="xadmin.add_tab('操作题回收站','<?php echo url('Operation/trash'); ?>')">
                                                    <i class="iconfont">&#xe6a7;</i>
                                                    <cite>操作题回收站</cite></a>
                                            </li>
                                        </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="考试管理">&#xe723;</i>
                            <cite>考试管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('专业管理','<?php echo url('Major/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>专业管理</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('科目管理','<?php echo url('Subject/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>科目管理</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                            <cite>管理员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('管理员列表','<?php echo url('Admin/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理员列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('角色管理','<?php echo url('Role/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>角色管理</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('权限管理','<?php echo url('Rule/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>权限管理</cite></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='<?php echo url('Index/welcome'); ?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
<!--        <script>-->
<!--            layui.use(['jquery'],function () {-->
<!--                var $ = layui.jquery;-->
<!--                $('.sub-menu li a').on('click',function(){-->
<!--                        layer.msg('0',{icon:5});-->
<!--                });-->
<!--            })-->
<!--        </script>-->
        <script>//百度统计可去掉
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>