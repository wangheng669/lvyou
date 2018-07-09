<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Admin extends Base
{
    public function index(){
        $adminList=model('Admin')->select();
        $adminCount=model('Admin')->count();
        return $this->fetch('admin-list',[
            'adminList'=>$adminList,
            'adminCount'=>$adminCount,
        ]);
    }
    public function adminAdd()
    {
        return $this->fetch('admin-add');    
    }
    public function adminEdit($id)
    {
        $adminEdit=model('admin')->get($id);
        return $this->fetch('admin-edit',[
            'adminEdit'=>$adminEdit
        ]); 
    }
    public function saveAdmin(){
        $post_data=request()->post();
        $post_data['password']=md5($post_data['password']);
        if(isset($post_data['id']))
        {
            return $this->operate('Admin',$post_data,true);
        }else{
            return $this->operate('Admin',$post_data,false);
        }
    }
    public function deleteAdmin(){
        return $this->delete('admin');
    }
}