<?php
namespace app\admin\controller;
use think\Controller;
use think\Cookie;
use think\Cache;
class Index extends Common {

    public function index(){
//        $rule = new \app\admin\behavior\Rule();
//        dump($rule->user);die;
        $id = Cookie::get('id');
        //读取缓存中的权限 显示菜单栏
        $rule = Cache::get('user_'.$id);
//        dump($rule['rules']);die;
        $this->assign('menus',$rule['menus']);
        return $this->fetch();
    }
    public function welcome(){
        return $this->fetch();
    }
}