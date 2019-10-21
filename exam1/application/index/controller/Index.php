<?php
namespace app\index\controller;
use app\admin\model\Subject;
use think\Session;
use think\Cookie;
use think\Db;
class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    //实现学生登陆
    public function login(){
        if(request()->isPost()){
            $data = input('post.');
            $json = model('Students')->login($data);
            return $json;
        }
    }

    //实现学生修改
    public function changePassword(){
        if(request()->isPost()){
            $data = input('post.');
            $json = model('Students')->changePassword($data);
            return $json;
        }
    }

    //实现登陆后选择 专业科目 点击开始考试 需要返回题
    public function getQuestion(){
        $data = input('get.');
        $major_id = $data['major_id'];
        //获取科目id
        $subject_id = $data['subject_id'];
        //获取单选题
        $single = Db::name('single')->field('right_key,status,major_id,subject_id,add_time',true)->where("status = 1 and major_id= $major_id and subject_id in ($subject_id)")->select()->toArray();
        //多选题
        $selection = Db::name('selection')->field('right_key,status,major_id,subject_id,add_time',true)->where("status = 1 and major_id= $major_id and subject_id in ($subject_id)")->select()->toArray();
        //判断题
        $judge = Db::name('judge')->field('right_key,status,major_id,subject_id,add_time',true)->where("status = 1 and major_id= $major_id and subject_id in ($subject_id)")->select()->toArray();
        //操作题
        $operation = Db::name('operation')->field('status,major_id,subject_id,add_time',true)->where("status = 1 and major_id= $major_id and subject_id in ($subject_id)")->select()->toArray();
        //打乱数组
        shuffle($single);
        shuffle($selection);
        shuffle($judge);
        shuffle($operation);
        return json(['code'=>1,'msg'=>'开始考试','single'=>$single,
            'selection'=>$selection,'judge'=>$judge,'operation'=>$operation,'subject_id'=>$subject_id]);
    }

    // 答题 进入下一题  需要缓存到文件
    public function nxet(){

    }

    //评分
    public function commitQuestion(){
        //获取cookie信息
        $admin = Cookie::get('admin');
        $admin = json_decode($admin);
        $data = input('post.');
        $subject_id = $data['subject_id'];
        //格式化json
        $data = json_decode($data["questions"]);
        //获取单选题答案
        $single_value = Db::name('single')->field('id,right_key')->where('status',1)->select();
        foreach ($single_value as $key => $value){
            $single[$value['id']] = $value['right_key'];
        }
        //获取多选题答案
        $selection_value = Db::name('selection')->field('id,right_key')->where('status',1)->select();
        foreach ($selection_value as $key => $value){
            //字符串转数组（分隔符）为了去掉 '.'号
            $str = explode(',',$value['right_key']);
            //数组转字符串
            $str = implode('',$str);
            //字符串转数组 （方便排序）
            $arr = str_split($str);
            //字母排序 降序
            asort($arr);
            //数组转字符串
            $str = implode('',$arr);
            $selection[$value['id']] = $str;
        }
        //获取判断题答案
        $judge_value = Db::name('judge')->field('id,right_key')->where('status',1)->select();
        foreach ($judge_value as $key => $value){
            $judge[$value['id']] = $value['right_key'];
        }
        //循环提交的答案
        foreach ($data as $key => $value){
            $id = $data[$key]->id; //提交的题号
            $right_key = $data[$key]->answer;  //提交的答案
            //判断题型
            switch ($data[$key]->type){
                case 1:   //判断题   拼接提交答案
                    $answer_judge[$id] = $right_key;
                    break;
                case 2:   //单选题  拼接提交答案
                    $answer_single[$id] = $right_key;
                    break;
                case 3:   //多选题  拼接提交答案 （转数组）
                    $str = implode('',$right_key);
                    //字符串转数组 （方便排序）
                    $arr = str_split($str);
                    //字母排序 降序
                    asort($arr);
                    //数组转字符串
                    $str = implode('',$arr);
                    $answer_selection[$id] = $str;
                    break;
                case 4:   //操作题  提交答案
                    $answer_operation[$id] = $right_key;
                    break;
            }
        }
        //判断分数(答对题数)
        $judge_count = count(array_intersect_assoc($judge,$answer_judge));
        $single_count = count(array_intersect_assoc($single,$answer_single));
        $selection_count = count(array_intersect_assoc($selection,$answer_selection));
        //总分
        $count = $judge_count*5+$single_count*3+$selection_count*3;
        //拼接提交数据
        foreach($answer_judge as $key => $value){
            $commit1[] = 'judge'.$key.'-'.$value;
            $commit_judge = implode(',',$commit1);
        }
        foreach($answer_single as $key => $value){
            $commit2[] = 'single'.$key.'-'.$value;
            $commit_single = implode(',',$commit2);
        }
        foreach($answer_selection as $key => $value){
            $commit2[] = 'selection'.$key.'-'.$value;
            $commit_selection = implode(',',$commit2);
        }
        foreach($answer_operation as $key => $value){
            $commit3[] = 'operation'.$key.'-'.$value;
            $commit_operation = implode(',',$commit3);
        }
        $data = [
            'single' => $commit_single,
            'selection' => $commit_selection,
            'judge' => $commit_judge,
            'operation' => $commit_operation,
            'username' => $admin->username,
            'class_name' => $admin->class_name,
            'major_id' => $admin->major_id,
            'subject_id' => $subject_id,
            'add_time' => date('Y-m-d H:i:s'),
            'scroe' => $count,
        ];
        //提交的数据 到数据库
        $res = Db::name('topic')->insert($data);
        if($res){
            return json(['code'=>'1','msg'=>'提交成功']);
        }else{
            return json(['code'=>'0','msg'=>'提交失败']);
        }
    }
}
