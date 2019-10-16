<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\admin\edit.html";i:1570704803;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
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

    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>登录名
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            <span class="x-red">*</span>将会成为您唯一的登入名
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="phone" class="layui-form-label">
                            <span class="x-red">*</span>手机
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="phone" value="<?php echo $data['tel']; ?>" name="tel" required="" lay-verify=""
                                   autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            <span class="x-red">*</span>将会成为您唯一的登入名
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><span class="x-red">*</span>角色</label>
                        <div class="layui-input-block">
                            <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <input type="checkbox" name="role[]" value="<?php echo $vo['id']; ?>" lay-skin="primary" title="<?php echo $vo['role_name']; ?>" <?php if(in_array(($vo['id']), is_array($data['role_id'])?$data['role_id']:explode(',',$data['role_id']))): ?>checked=""<?php endif; ?>>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_pass" class="layui-form-label">
                            <span class="x-red">*</span>密码
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_pass" name="password" value="<?php echo $data['password']; ?>" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">
                            6到16个字符
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                        </label>
                        <button  class="layui-btn" lay-filter="add" lay-submit="">
                            增加
                        </button>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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
                    nikename: function(value) {
                        if (value.length < 5) {
                            return '昵称至少得5个字符啊';
                        }
                    },
                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    repass: function(value) {
                        if ($('#L_pass').val() != $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                //form提交数组函数
                filterData = function (data) {
                    var roleListIds = {};
                    var temp = {};
                    for (var key in data) {
                        if (key.indexOf("[") === -1) {
                            roleListIds[key] = data[key];
                        } else {
                            temp[key] = data[key];
                        }
                    }

                    var temp_arr = [];
                    for (var key in temp) {
                        var _arr = key.split("[");
                        var field = _arr[0];
                        if (temp_arr.indexOf(field) === -1) {
                            temp_arr.push(field);
                        }
                    }

                    for (var i in temp_arr) {
                        var _f = temp_arr[i];
                        var _temp = [];
                        for (var k in temp) {
                            console.log(k);
                            if (k.indexOf(_f) !== -1) {
                                _temp.push(temp[k])
                            }
                        }
                        roleListIds[_f] = _temp;
                    }
                    return roleListIds;
                };

                //监听提交
                form.on('submit(add)', function(data) {
                    $.post("<?php echo url('Admin/edit'); ?>",{data:filterData(data.field)},function (data) {
                        if(data.status == 1){
                            //发异步，把数据提交给php
                            layer.alert(data.msg, {icon: 6}, function() {
                                //关闭当前frame
                                xadmin.close();

                                // 可以对父窗口进行刷新
                                xadmin.father_reload();
                            });
                        }else{
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

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>