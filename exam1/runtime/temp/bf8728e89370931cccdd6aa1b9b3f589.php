<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\judge\trash.html";i:1569749370;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
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
                            <div class="layui-inline layui-show-xs-block">
                                <input class="layui-input"  autocomplete="off" placeholder="开始日" name="start" id="start">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <input class="layui-input"  autocomplete="off" placeholder="截止日" name="end" id="end">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <input type="text" name="username"  placeholder="请输入编号" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <input type="text" name="username"  placeholder="请输入专业" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <input type="text" name="username"  placeholder="请输入科目" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-inline layui-show-xs-block">
                                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="layui-card-header">
                        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量恢复</button>
                    </div>
                    <div class="layui-card-body ">
                        <table class="layui-table layui-form " lay-size="sm">
                          <thead>
                            <tr>
                              <th>
                                <input type="checkbox" name="" lay-filter="checkall" lay-skin="primary">
                              </th>
                                <th>ID</th>
                                <th>题目</th>
                                <th>正确答案</th>
                                <th>专业</th>
                                <th>科目</th>
                                <th>添加时间</th>
                                <th>状态</th>
                                <th>操作</th></tr>
                          </thead>
                          <tbody>
                          <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                              <td>
                                <input type="checkbox" name="id" value="<?php echo $vo['id']; ?>" lay-skin="primary">
                              </td>
                                <td><?php echo $vo['id']; ?></td>
                                <td><?php echo $vo['name']; ?></td>
                                <td><?php echo $vo['right_key']; ?></td>
                                <td><?php echo $vo['major_name']; ?></td>
                                <td><?php echo $vo['subject_name']; ?></td>
                                <td><?php echo $vo['add_time']; ?></td>
                              <td class="td-status">
                                <span class="layui-btn layui-btn-danger layui-btn-mini">已删除</span>
                              <td class="td-manage">
                                <a title="恢复" onclick="member_trash(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                                  <i class="layui-icon">&#xe669;</i>
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
                            <div>
                                <?php echo $data->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;

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
      });

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要彻底删除吗？',function(index){
              //ajax请求 id数组
              $.post("<?php echo url('Judge/remove'); ?>",{id:id},function (data) {
                  if(data.status == 1){
                      //发异步删除数据
                      $(obj).parents("tr").remove();
                      layer.msg(data.msg,{icon:1,time:1000});
                  }else{
                      layer.msg(data.msg, {icon: 2});
                  }
              });
          });
      }


      /*用户-恢复*/
      function member_trash(obj,id){
          layer.confirm('确认恢复吗？',function(index){
              $.post("<?php echo url('Judge/recover'); ?>",{id:id},function (data) {
                  if(data.status == 1){
                      //发异步恢复数据
                      $(obj).parents("tr").remove();
                      layer.msg(data.msg,{icon:1,time:1000});
                  }else{
                      //恢复失败
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
  
        layer.confirm('确认要恢复吗？'+ids.toString(),function(index){
            //ajax请求 id数组
            $.post("<?php echo url('Judge/recover'); ?>",{id:ids},function (data) {
                if(data.status == 1){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg(data.msg, {icon: 1});
                    $(".layui-form-checked").not('.header').parents('tr').remove();
                }else{
                    layer.msg(data.msg, {icon: 2});
                }
            });
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>