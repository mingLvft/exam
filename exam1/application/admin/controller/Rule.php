<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Rule extends Common{

    //权限页面显示
    public function index(){
        $count = Db::name('rule')->where("is_show",1)->count();
        $data = Db::name('rule')->where("is_show",1)->paginate(20,$count);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //权限添加
    public function add(){
        $model = Db::name('rule');
        $data = input('post.data/a');
        if (!$data) {
            return json(array('status' => 0, 'msg' => '参数错误'));
        }
        $data['add_time'] = date("Y-m-d H:i:s");
        $res = $model->insert($data);
        if ($res) {
            return json(array('status' => 1, 'msg' => '添加成功'));
        } else {
            return json(array('status' => 0, 'msg' => '添加失败'));
        }
    }

    //权限编辑
    public function edit(){
        if(request()->isPost()){
            $model = Db::name('rule');
            $data = input('post.data/a');
            if (!$data) {
                return json(array('status' => 0, 'msg' => '参数错误'));
            }
            $res = $model->where("id",$data['id'])->update($data);
            if ($res !== false){
                return json(array('status'=>1,'msg'=>'修改成功'));
            }else{
                return json(array('status'=>0,'msg'=>'修改失败'));
            }
        }else{
            $model = Db::name('rule');
            $id = input('get.id');
            $data = $model->where("id",$id)->find();
            //查询出所有权限信息
            $rule = $model->select();
            $this->assign('data',$data);
            $this->assign('rule',$rule);
            return $this->fetch();
        }
    }

    //权限的删除
    public function del(){
        $model = Db::name('rule');
        $id = input('post.id/a');
        //转换成数组方便使用mysql in语法
        $id = implode(',',$id);
        $res = $model->where("id in ($id)")->setField("is_show",0);
        if ($res){
            return json(array('status'=>1,'msg'=>'删除成功'));
        }else{
            return json(array('status'=>0,'msg'=>'删除失败'));
        }
    }
}