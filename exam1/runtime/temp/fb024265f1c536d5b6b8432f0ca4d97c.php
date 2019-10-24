<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpStudy\PHPTutorial\WWW\exam1\public/../application/admin\view\single\index.html";i:1571880415;s:73:"D:\phpStudy\PHPTutorial\WWW\exam1\application\admin\view\public\base.html";i:1569555673;}*/ ?>
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
                                    <input class="layui-input"  autocomplete="off" placeholder="开始日" value="<?php echo \think\Request::instance()->get('start'); ?>" name="start" id="start">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input class="layui-input"  autocomplete="off" placeholder="截止日" value="<?php echo \think\Request::instance()->get('end'); ?>" name="end" id="end">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="id"  placeholder="请输入编号" value="<?php echo \think\Request::instance()->get('id'); ?>" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <select name="major_id" lay-filter="major" id="major_id">
                                        <option value="">请选择一个专业</option>
                                        <?php if(is_array($major) || $major instanceof \think\Collection || $major instanceof \think\Paginator): $i = 0; $__LIST__ = $major;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['id']; ?>" <?php if(\think\Request::instance()->get('major_id') == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['major_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <select name="subject_id" id="subject_id">
                                        <option value="">请选择一个科目</option>
                                    </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加','<?php echo url('Single/add'); ?>',800,600)"><i class="layui-icon"></i>添加</button>
                            <form  class="layui-form layui-col-space5" style="display: inline-block" name="form1" action="<?php echo url('Single/import'); ?>" enctype="multipart/form-data" href="javascript:;" method="post" id="import">
                                <div class="layui-inline layui-show-xs-block">
                                    <select name="major_id1" lay-filter="major1" id="major_id1"  >
                                        <option value="">请选择一个专业</option>
                                        <?php if(is_array($major) || $major instanceof \think\Collection || $major instanceof \think\Paginator): $i = 0; $__LIST__ = $major;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['id']; ?>" <?php if(\think\Request::instance()->get('major_id') == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['major_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <select name="subject_id1" id="subject_id1"  >
                                        <option value="">请选择一个科目</option>
                                    </select>
                                </div>
                                <input type="file" name="name" id="file" value=""/>
                                <input type="submit" value="提交"/>
                            </form>
                            <a href="<?php echo url('Single/expData'); ?>">
                                <button type="button" class="layui-btn" >
                                    <i class="layui-icon">&#xe67c;</i>导出单选题
                                </button>
                            </a>

                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form" lay-size="sm">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>题目</th>
                                    <th>A选项</th>
                                    <th>B选项</th>
                                    <th>C选项</th>
                                    <th>D选项</th>
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
                                      <input type="checkbox" name="id" value="<?php echo $vo['id']; ?>"   lay-skin="primary">
                                    </td>
                                    <td><?php echo $vo['id']; ?></td>
                                    <td><?php echo $vo['single_name']; ?></td>
                                    <td><?php echo $vo['A']; ?></td>
                                    <td><?php echo $vo['B']; ?></td>
                                    <td><?php echo $vo['C']; ?></td>
                                    <td><?php echo $vo['D']; ?></td>
                                    <td><?php echo $vo['right_key']; ?></td>
                                    <td><?php echo $vo['major_name']; ?></td>
                                    <td><?php echo $vo['subject_name']; ?></td>
                                    <td><?php echo $vo['add_time']; ?></td>
                                    <td class="td-status">
                                      <span class="layui-btn layui-btn-normal layui-btn-mini">正常</span></td>
                                    <td class="td-manage">
                                      <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('Single/edit'); ?>?id=<?php echo $vo['id']; ?>',600,400)" href="javascript:;">
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
                        <div class="layui-card-body">
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
    </body>
    <script>

      layui.use(['laydate','form','upload','jquery'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;
        var $ = layui.jquery;

        //上传题
          var upload = layui.upload;

          //执行实例
          var uploadInst = upload.render({
              elem: '#test1' //绑定元素
              ,url: '/upload/' //上传接口
              ,done: function(res){
                  //上传完毕回调
              }
              ,error: function(){
                  //请求异常回调
              }
          });

          // $('#upload').on('click',function () {
          //     $.url("<?php echo url('Single/export'); ?>",{},function(data) {
          //         // layer.alert(data);
          //     });
          //     return false;
          // });

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

        //选择专业二级联动
        form.on('select(major)',function (data) {
            var major_id = $('#major_id').val();   //获取专业表id
            $.post("<?php echo url('Single/major'); ?>",{major_id:major_id},function (data) {
                $("#subject_id").empty();    //清空#subject_id里的元素
                $.each(data,function (key,val) {
                    $("#subject_id").append("<option value="+val.id+">"+val.subject_name+"</option>");
                })
                form.render('select');  //渲染
            });
        })

          //导入题   选择专业科目二级联动

          form.on('select(major1)',function (data) {

              var major_id1 = $('#major_id1').val();   //获取专业表id

              $.post("<?php echo url('Single/major1'); ?>",{major_id1:major_id1},function (data) {
                  $("#subject_id1").empty();    //清空#subject_id里的元素

                  $.each(data,function (key,val) {

                      $("#subject_id1").append("<option value="+val.id+">"+val.subject_name+"</option>");

                  });
                  form.render('select');  //渲染
              });
          });
      });
      // //导入题
      // layui.use(['form','upload'],function(){
      //     var form=layui.form;
      //     var upload=layui.upload;
      //     upload.render({ //允许上传的文件后缀
      //         elem: '#myfile'
      //         ,data:{major_id:function () {
      //                 return major_id = $('#major_id').val();
      //             },subject_id:function () {
      //                 return subject_id = $('#subject_id').val();
      //             }}
      //         ,url: "<?php echo url('Single/import'); ?>"
      //         ,accept: 'file' //普通文件
      //         ,exts: 'xls|excel|xlsx' //只允许上传压缩文件
      //         ,auto: false //选择文件后不自动上传
      //         ,bindAction: '#upload-bth' //指向一个按钮触发上传
      //         ,done: function(res){
      //             if(res.code==1){
      //                 layer.msg('上传成功,已解析数据',{icon:6});
      //                 location.href="<?php echo url('Single/index'); ?>";
      //             }else{
      //                 layer.msg('解析失败',{icon:5});
      //             }
      //         }
      //     });
      //     form.on('submit(formsub)',function(data){
      //         layer.msg('导入数据具体详情未协商确认,待确认后处理');
      //         return false;
      //     })
      // })
      // function Excel(){
      //         $.post("<?php echo url('Single/excel'); ?>",{data:data.field,name:'single'},function () {
      //
      //         });
      // }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post("<?php echo url('Single/del'); ?>",{id:id},function (data) {
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
            $.post("<?php echo url('Single/del'); ?>",{id:ids},function (data) {
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

</html>