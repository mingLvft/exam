<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

/*
 * 成绩管理
 */
class Scroe extends Controller{

    //首页显示
    public function index(){
        $model = Db::name('topic');
        $count = $model->count();
        //链表查询出专业科目 and 成绩
        $data = $model->alias('a')->field('a.*,b.major_name,c.subject_name')
            ->join('em_major b','a.major_id=b.id')
            ->join('em_subject c','a.subject_id=c.id')->where("a.status",1)->paginate(20,$count);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //阅卷
    public function scroe(){
        if(request()->isPost()){
            $data = input('post.data/a');
            $model = Db::name('topic');
            //查询出原数据库成绩
            $info = $model->where('id',$data['id'])->select();
            if($info[0]['not_read'] == 1){
                return json(array('status' => 0, 'msg' => '已经阅卷'));
            }
            if (!$data) {
                return json(array('status' => 0, 'msg' => '参数错误'));
            }
            //修改成绩与原成绩相加
//            $res = $model->where('id',$data['id'])->setField('scroe',$info[0]['scroe']+$data['scroe']);
            $res = $model->where('id',$data['id'])->update(['scroe'=>$info[0]['scroe']+$data['scroe'],'not_read'=>1]);
            if ($res !== false){
                return json(array('status'=>1,'msg'=>'修改成功'));
            }else{
                return json(array('status'=>0,'msg'=>'修改失败'));
            }
        }else{
            $id = input('get.id');
            $model = Db::name('topic');
            //链表查询出专业科目 and 成绩
            $data = $model->alias('a')->field('a.*,b.major_name,c.subject_name')
                ->join('em_major b','a.major_id=b.id')
                ->join('em_subject c','a.subject_id=c.id')->where('a.id',$id)->find();
//            //判断是否阅卷
//            $info = $model->where('id',$data['id'])->select();
//            if($info[0]['not_read'] == 1){
//                $this->error('已经阅卷',url('scroe/index'));
//            }
            $this->assign('data',$data);
            return $this->fetch();
        }
    }

    //成绩管理的删除
    public function del(){
        $model = Db::name('topic');
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

    //成绩管理回收站
    public function trash(){
        $model = Db::name('topic');
        $count = $model->count();
        //链表查询出专业科目 and 成绩
        $data = $model->alias('a')->field('a.*,b.major_name,c.subject_name')
            ->join('em_major b','a.major_id=b.id')
            ->join('em_subject c','a.subject_id=c.id')->where("a.status",0)->paginate(20,$count);
        $this->assign('data',$data);
        return $this->fetch();
    }

    //成绩管理回收站的恢复
    public function recover(){
        $model = Db::name('topic');
        $id = input('post.id/a');
        //转换成数组方便使用mysql in语法
        $id = implode(',',$id);
        //状态恢复
        $res = $model->where("id in ($id)")->setField("status",1);
        if ($res){
            return json(array('status'=>1,'msg'=>'已恢复'));
        }else{
            return json(array('status'=>0,'msg'=>'恢复失败'));
        }
    }

    //成绩管理回收站的彻底删除
    public function remove(){
        $model = Db::name('topic');
        $id = input('post.id');
        $res = $model->where("id",$id)->delete();
        if ($res){
            return json(array('status'=>1,'msg'=>'彻底删除成功'));
        }else{
            return json(array('status'=>0,'msg'=>'彻底删除失败'));
        }
    }
}