<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\judge\add.html";i:1571211691;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.2</title>
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

<style>
    .layui-form-select{
        width:20%;
    }
</style>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">题目</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入题目" id="desc" name="judge_name" lay-verify="required" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">答案</label>
                        <div class="layui-input-block">
                            <select name="right_key" lay-verify="required">
                                <option value="">请选择答案</option>
                                <option value="1">正确</option>
                                <option value="0">错误</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">专业</label>
                        <div class="layui-input-block">
                        <select name="major_id" lay-verify="required">
                            <option value="">请选择一个专业</option>
                            <?php if(is_array($major) || $major instanceof \think\Collection || $major instanceof \think\Paginator): $i = 0; $__LIST__ = $major;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['major_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">科目</label>
                        <div class="layui-input-block">
                        <select name="subject_id" lay-verify="required">
                            <option value="">请选择一个科目</option>
                            <?php if(is_array($subject) || $subject instanceof \think\Collection || $subject instanceof \think\Paginator): $i = 0; $__LIST__ = $subject;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['subject_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
                </form>
            </div>
        </div>
        <script>
            layui.use(['form', 'layer','jquery'],
            function() {
                $ = layui.jquery;
                var form = layui.form;
                layer = layui.layer;

                //监听提交
                form.on('submit(add)', function(data) {
                    $.post("<?php echo url('Judge/add'); ?>",{data:data.field},function (data) {
                        if(data.status == 1){
                            //发异步，把数据提交给php
                            layer.alert(data.msg, {icon: 6}, function() {
                                //关闭当前frame
                                xadmin.close();

                                // 可以对父窗口进行刷新
                                xadmin.father_reload();
                            });
                        }else{
                            //发异步，把数据提交给php
                            layer.alert(data.msg, {icon: 5}, function() {
                                //关闭当前frame
                                xadmin.close();

                                // 可以对父窗口进行刷新
                                xadmin.father_reload();
                            });
                        }
                    });
                    return false;
                });
            });
        </script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>