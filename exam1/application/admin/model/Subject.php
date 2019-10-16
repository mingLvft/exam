<?php
namespace app\admin\model;
use think\Model;
class Subject extends Model{

    //获取科目下对应的专业信息
    public function getAllData($status){
        $count = $this->where("status",$status)->count();
        $data = $this->alias('a')->
        join('em_major b', 'a.major_id=b.id')
            ->field('a.*,b.major_name')
            ->where("a.status",$status)->paginate(20,$count);
        return $data;
    }
}