<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Banner extends Base
{
    public function index(){
        $bannerList=model('Banner')->select();
        $bannerCount=model('Banner')->count();
        return $this->fetch('banner-list',[
            'bannerList'=>$bannerList,
            'bannerCount'=>$bannerCount,
        ]);
    }
    public function bannerAdd(){
        return $this->fetch('banner-add');
    }
    public function bannerEdit($id)
    {
        $bannerEdit=model('Banner')->get($id);
        return $this->fetch('banner-edit',[
            'bannerEdit'=>$bannerEdit
        ]); 
    }
    public function saveBanner(){
        $post_data=request()->post();
        if($post_data['is_active']==1){
            model('Banner')->where('is_active','=',1)->setField('is_active',0);
        }
        if(isset($post_data['id']))
        {
            return $this->operate('Banner',$post_data,true);
        }else{
            return $this->operate('Banner',$post_data,false);
        }
    }
    public function deleteBanner(){
        return $this->delete('Banner');
    }
}