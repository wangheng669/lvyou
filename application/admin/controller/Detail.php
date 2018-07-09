<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Detail extends Base
{
    public function index(){
        $detailList=model('detail')->select();
        $detailCount=model('detail')->count();
        return $this->fetch('detail-list',[
            'detailList'=>$detailList,
            'detailCount'=>$detailCount,
        ]);
    }
    public function detailAdd()
    {
        $category=model('category')->select();
        $address=model('address')->select();
        return $this->fetch('detail-add',[
            'category'=>$category,
            'address'=>$address
        ]);    
    }
    public function detailEdit($id)
    {
        $detailEdit=model('detail')->get($id);
        $detailEdit['content']=html_entity_decode($detailEdit['content']);
        $category=model('category')->select();
        $address=model('address')->select();
        return $this->fetch('detail-edit',[
            'detailEdit'=>$detailEdit,
            'category'=>$category,
            'address'=>$address
        ]); 
    }
    public function savedetail(){
        $post_data=request()->post();
        if(isset($post_data['id']))
        {
            return $this->operate('detail',$post_data,true);
        }else{
            return $this->operate('detail',$post_data,false);
        }
    }
    public function deletedetail(){
        return $this->delete('detail');
    }
}