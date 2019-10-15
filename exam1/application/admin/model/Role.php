<?php
namespace app\admin\model;
use Think\Db;
use think\Model;
/*
 * 管理员
 */
class Role extends Model{

    //获取角色下对应的权限id以及角色信息
    public function getAllData($status){
        $count = $this->where("status",$status)->count();
        $data = $this->alias('a')
            ->join('em_role_rule b', 'a.id=b.role_id')
            ->field('a.*,b.rule_id')
            ->where("a.status",$status)->paginate(20,$count);
        return $data;
    }

    //角色添加
    public function addRole($data){
        //检查角色是否可用
        $info = $this->where("role_name",$data['role_name'])->find();
        if($info){
            return false;
        }
        //添加时间
        $data['add_time'] = date("Y-m-d H:i:s");
        //删除字段rule
        unset($data['rule']);
        //insertGetId方法新增数据并返回主键值
        $id = $this->insertGetId($data);
        return $id;
    }

    //管理员修改
    public function updateRole($data){
        //删除字段role
        unset($data['rule']);
        $res = $this->where("id",$data['id'])->update($data);
        return $res;
    }
}