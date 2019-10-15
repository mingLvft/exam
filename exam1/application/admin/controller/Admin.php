<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

/*
 * 管理员添加
 */
class Admin extends Common{
    //管理员页显示
    public function index(){
        //获取管理员下对应的角色id以及管理员信息
        $data = model('Admin')->getAllData(1);
        $this->assign('data',$data);
        //获取所有角色
        $role = Db::name('role')->where("status",1)->select();
        $this->assign('role',$role);
        return $this->fetch();
    }

    //管理员添加
    public function add(){
        if(request()->isPost()){
            $data = input('post.data/a');
            if (!$data) {
                return json(array('status' => 0, 'msg' => '参数错误'));
            }
            //添加数据到管理员表
            $id = model('admin')->addAdmin($data);
            //将角色id数组 转成字符串
            $data['role'] = implode(',',$data['role']);
                $admin_role = array(
                    'admin_id' => $id,
                    'role_id' => $data['role']
                );
            if ($id) {
                //添加到 管理员与角色的中间表
                Db::name('admin_role')->insert($admin_role);
                return json(array('status' => 1, 'msg' => '添加成功'));
            } else {
                return json(array('status' => 0, 'msg' => '添加失败'));
            }
        }else{
            $data = Db::name('role')->where("status",1)->select();
            $this->assign('data',$data);
            return $this->fetch();
        }
    }

    //管理员修改
    public function edit(){
        if(request()->isPost()){
            $data = input('post.data/a');
            if (!$data) {
                return json(array('status' => 0, 'msg' => '参数错误'));
            }
            //修改数据到管理员表
            $res = model('Admin')->updateAdmin($data);
            //将角色id数组 转成字符串
            $data['role'] = implode(',',$data['role']);
            $admin_role = array(
                'admin_id' => $data['id'],
                'role_id' => $data['role']
            );
            if ($res !== false){
                //修改管理员与角色的中间表
                Db::name('admin_role')->where("admin_id",$data['id'])->update($admin_role);
                return json(array('status'=>1,'msg'=>'修改成功'));
            }else{
                return json(array('status'=>0,'msg'=>'修改失败'));
            }
        }else{
            $id = input('get.id');
            //获取管理员下对应的角色id
            $data = Db::name('admin')->alias('a')
                ->join('em_admin_role b', 'a.id=b.admin_id')
                ->join('em_role c','b.role_id=c.id')
                ->field('a.*,b.role_id')
                ->where("a.id",$id)->find();
            //获取角色信息
            $role = Db::name('role')->where("status",1)->select();
            $this->assign('role',$role);
            $this->assign('data',$data);
            return $this->fetch();
        }
    }

    //管理员的删除
    public function del(){
        $model = Db::name('admin');
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
}