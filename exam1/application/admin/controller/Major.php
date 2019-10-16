<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;

class Major extends Common{

    //专业管理页面显示
    public function index(){
        $model = Db::name('major');
        $count = $model->where("status",1)->count();
        $data = $model->where("status",1)->paginate(20,$count);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //专业管理 添加
    public function add(){
        if (request()->isPost()) {
            $model = Db::name('major');
            $data = input('post.data/a');
            //验证器
            $data_validate = [
                'major_name' => $data['major_name'],
            ];
            $validate = Loader::validate('User');
            if(!$validate->check($data_validate)){
                return json(array('status' => 0, 'msg' => $validate->getError()));
            }

            $data['add_time'] = date("Y-m-d H:i:s");
            $res = $model->insert($data);
            if ($res) {
                return json(array('status' => 1, 'msg' => '添加成功'));
            } else {
                return json(array('status' => 0, 'msg' => '添加失败'));
            }
        } else {
            return $this->fetch();
        }
    }

    //专业管理 删除
    public function del(){
        $model = Db::name('major');
        $id = input('post.id/a');
        //转换成数组方便使用mysql in语法
        $id = implode(',',$id);
        $res = $model->where("id in ($id)")->setField("status",0);
        if ($res){
            return json(array('status'=>1,'msg'=>'删除成功'));
        }else{
            return json(array('status'=>0,'msg'=>'删除失败'));
        }
    }

    //专业管理修改
    public function edit(){
        if(request()->isPost()){
            $model = Db::name('major');
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
            $model = Db::name('major');
            $id = input('get.id');
            $data = $model->where("id",$id)->find();
            $this->assign('data',$data);
            return $this->fetch();
        }
    }
}