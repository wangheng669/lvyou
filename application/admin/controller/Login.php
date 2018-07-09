<?php

namespace app\admin\controller;

use \think\Controller;

class Login extends Controller
{
    //判断是否已登录
    public function index(){
        if(session('id')!=null){
            $this->success('你已经登录了','index/index');
        }
        return $this->fetch('index');
    }

    //登录验证
    public function verifyAdmin(){
        $post_data=request()->post();
        $admin=model('Admin')->where(['username'=>$post_data['username']])->find();
        if($admin){
            if(md5($post_data['password'])==$admin['password']){
                session('id',$admin['id']);
                return ['message'=>'登录成功','status'=>3];
            }
        }
        return ['message'=>'登录失败','status'=>0];
    }
    public function exitLogin(){
        session('id',null);
        $this->success('退出成功','Login/index');
    }
}