<?php

namespace app\admin\common;

use think\Controller;
use think\Session;

class Base extends Controller
{
    //初始化时判断是否登录
    public function _initialize(){
        $this->isAlreadyLogin();
    }
    //判断是否登录
    public function isAlreadyLogin(){
        
        if(session('id')==null){
            $this->success('请登录','login/index');
        }
    }
    //修改和保存操作
    public function operate($model,$data,$where)
    {
        $status    = 0;
        $message   = '操作失败';
        $validate=validate($model);
        if(!$validate->check($data)){
            $message = $validate->getError();
        }else if(($where&&model($model)->allowField(true)->save($data, ['id' => $data['id']]))
        ||(model($model)->allowField(true)->save($data))){
                $status  = 1;
                $message = '操作成功';
        }
        return [
            'status'  => $status,
            'message' => $message,
        ];
    }
    //上传图片
    public function upload()
    {
        $message = '上传失败';
        $src     = '';
        $file    = request()->file('file');
        if (empty($file)) {
            $message = '图片上传失败';
        } else {
            //进行上传操作
            $map  = [
                'ext'  => 'jpg,png,gif',
                'size' => 3000000,
            ];
            $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
            if (is_null($info)) {
                $message = '图片信息出错';
            }
            //获取图片名称
            $src = $info->getSaveName();
        }
        return [
            'message' => $message,
            'src'     => $src,
        ];
    }
    //删除操作
    public function delete($model)
    {
        $status    = 0;
        $message   = '删除失败';
        $post_data = request()->post();
        if (model($model)->destroy(intval($post_data['id']))) {
            $status  = 2;
            $message = '删除成功';
        }
        return [
            'status'  => $status,
            'message' => $message,
        ];
    }
}