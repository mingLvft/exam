<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\role\edit.html";i:1571707863;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
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
            <form action="" method="post" class="layui-form layui-form-pane">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>角色名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="role_name" required="" value="<?php echo $data['role_name']; ?>" lay-verify="required"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                        <tr>
                            <td>
                                <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['parent_id'] == '0'): ?>
                                <input type="checkbox" name="rule[]" class="<?php echo $vo['controller_name']; ?>" <?php if(in_array(($vo['id']), is_array($data['rule_id'])?$data['rule_id']:explode(',',$data['rule_id']))): ?>checked=""<?php endif; ?> lay-skin="primary" value="<?php echo $vo['id']; ?>" lay-filter="father" title="<?php echo $vo['rule_name']; ?>">
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </td>
                            <td>
                                <div class="layui-input-block">
                                    <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['parent_id'] != '0'): ?>
                                    <input name="rule[]" class="<?php echo $vo['controller_name']; ?>" lay-skin="primary" <?php if(in_array(($vo['id']), is_array($data['rule_id'])?$data['rule_id']:explode(',',$data['rule_id']))): ?>checked=""<?php endif; ?> type="checkbox" value="<?php echo $vo['id']; ?>" title="<?php echo $vo['rule_name']; ?>">
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="content" class="layui-textarea"><?php echo $data['content']; ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit="" lay-filter="add">增加</button>
                </div>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            </form>
        </div>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;

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
                $.post("<?php echo url('Role/edit'); ?>",{data:filterData(data.field)},function (data) {
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

        form.on('checkbox(father)', function(data){

            if(data.elem.checked){
                $(data.elem).parent().siblings('td').find('input').prop("checked", true);
                form.render(); 
            }else{
               $(data.elem).parent().siblings('td').find('input').prop("checked", false);
                form.render();  
            }
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