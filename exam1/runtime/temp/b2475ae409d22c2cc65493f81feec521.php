<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\single\edit.html";i:1571211842;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
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
                            <textarea placeholder="请输入题目" id="desc" name="single_name" lay-verify="required" class="layui-textarea"><?php echo $data['single_name']; ?> </textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">A选项</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入A选项" id="desc" name="A"  lay-verify="required" class="layui-textarea"><?php echo $data['A']; ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">B选项</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入B选项" id="desc" name="B"  lay-verify="required" class="layui-textarea"><?php echo $data['B']; ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">C选项</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入C选项" id="desc" name="C" lay-verify="required" class="layui-textarea"><?php echo $data['C']; ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">D选项</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入D选项" id="desc" name="D" lay-verify="required" class="layui-textarea"><?php echo $data['D']; ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>正确答案</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="right_key" required="" value="<?php echo $data['right_key']; ?>" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">专业</label>
                        <div class="layui-input-block">
                            <select name="major_id" lay-verify="required">
                                <option value="">请选择一个专业</option>
                                <?php if(is_array($major) || $major instanceof \think\Collection || $major instanceof \think\Paginator): $i = 0; $__LIST__ = $major;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['id']; ?>" <?php if($data['major_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['major_name']; ?></option>
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
                                <option value="<?php echo $vo['id']; ?>" <?php if($data['subject_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['subject_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">修改</button></div>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                </form>
                <form action="">

                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
                });

                //监听提交
                form.on('submit(add)', function(data) {
                    $.post("<?php echo url('Single/edit'); ?>",{data:data.field},function (data) {
                        if(data.status == 1){
                            //修改成功
                            //发异步，把数据提交给php
                            layer.alert(data.msg, {icon: 6}, function() {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                // 可以对父窗口进行刷新
                                xadmin.father_reload();
                            });
                        }else{
                            //发异步，把数据提交给php
                            layer.alert(data.msg, {icon: 5}, function() {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                // 可以对父窗口进行刷新
                                xadmin.father_reload();
                            });
                        }
                    });
                    return false;
                });

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>