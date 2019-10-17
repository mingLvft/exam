<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\rule\index.html";i:1571299458;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
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
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-input-inline">
                                    <input type="text" name="rule_name" placeholder="权限名称" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-input-inline">
                                    <input type="text" name="module_name" placeholder="模块" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-input-inline">
                                    <input type="text" name="controller_name" placeholder="控制器" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-input-inline">
                                    <input type="text" name="action_name" placeholder="方法" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                </div>
                                上级权限：<div class="layui-inline layui-show-xs-block">
                                    <select name="parent_id">
                                        <option value="0">顶级权限</option>
                                        <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['parent_id'] == '0'): ?>
                                        <option value="<?php echo $vo['id']; ?>">|--<?php echo $vo['rule_name']; ?></option>
                                        <?php endif; if($vo['action_name'] == 'index'): ?>
                                        <option value="<?php echo $vo['id']; ?>">|----<?php echo $vo['rule_name']; ?></option>
                                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                是否菜单显示
                                <input type="radio" name="is_show" value="1" lay-skin="primary" title="是" checked="">
                                <input type="radio" name="is_show" value="0" lay-skin="primary" title="否">
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="add"><i class="layui-icon"></i>增加</button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th>
                                    <input type="checkbox" lay-filter="checkall" name=""  lay-skin="primary">
                                  </th>
                                  <th>ID</th>
                                  <th>权限规则</th>
                                  <th>权限名称</th>
<!--                                  <th>顶级权限</th>-->
                                  <th>操作</th>
                              </thead>
                              <tbody>
                              <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                                  <td>
                                   <input type="checkbox" name="id" value="<?php echo $vo['id']; ?>" lay-skin="primary">
                                  </td>
                                  <td><?php echo $vo['id']; ?></td>
                                  <td><?php echo $vo['module_name']; ?>/<?php echo $vo['controller_name']; ?>/<?php echo $vo['action_name']; ?></td>
                                  <td><?php echo $vo['rule_name']; ?></td>
<!--                                  <td><?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;if($vo['id'] == $v['parent_id']): ?><?php echo $k; ?><?php echo $vo['rule_name']; endif; endforeach; endif; else: echo "" ;endif; ?></td>-->
                                  <td class="td-manage">
                                    <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('Rule/edit'); ?>?id=<?php echo $vo['id']; ?>')" href="javascript:;">
                                      <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a title="删除" onclick="member_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                                      <i class="layui-icon">&#xe640;</i>
                                    </a>
                                  </td>
                                </tr>
                              <?php endforeach; endif; else: echo "" ;endif; ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <?php echo $data->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;

          // 监听全选
          form.on('checkbox(checkall)', function(data){

              if(data.elem.checked){
                  $('tbody input').prop('checked',true);
              }else{
                  $('tbody input').prop('checked',false);
              }
              form.render('checkbox');
          });

        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });

          //监听提交
          form.on('submit(add)', function(data) {
              $.post("<?php echo url('Rule/add'); ?>",{data:data.field},function (data) {
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


      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post("<?php echo url('Rule/del'); ?>",{id:id},function (data) {
                  if(data.status == 1){
                      //删除成功 删除元素
                      $(obj).parents("tr").remove();
                      layer.msg(data.msg,{icon:1,time:1000});
                  }else{
                      //删除失败
                      layer.msg(data.msg,{icon:2,time:1000});
                  }
              });
          });
      }



      function delAll (argument) {
          var ids = [];

          // 获取选中的id
          $('tbody input').each(function(index, el) {
              if($(this).prop('checked')){
                  ids.push($(this).val())
              }
          });
          //批量删除
          layer.confirm('确认要删除吗？'+ids.toString(),function(index){
              //ajax请求 id数组
              $.post("<?php echo url('Rule/del'); ?>",{id:ids},function (data) {
                  if(data.status == 1){
                      //捉到所有被选中的，发异步进行删除
                      layer.msg(data.msg, {icon: 1});
                      $(".layui-form-checked").not('.header').parents('tr').remove();
                  }else{
                      layer.msg(data.msg, {icon: 2});
                  }
              });
          })
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>

</html>