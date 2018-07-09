<?php

namespace app\admin\controller;

use app\admin\common\Base;

class Address extends Base
{
    public function index(){
        $addressList=model('address')->select();
        $addressCount=model('address')->count();
        return $this->fetch('address-list',[
            'addressList'=>$addressList,
            'addressCount'=>$addressCount,
        ]);
    }
    public function addressAdd()
    {
        return $this->fetch('address-add');    
    }
    public function addressEdit($id)
    {
        $addressEdit=model('address')->get($id);
        return $this->fetch('address-edit',[
            'addressEdit'=>$addressEdit
        ]); 
    }
    public function saveaddress(){
        $post_data=request()->post();
        if(isset($post_data['id']))
        {
            return $this->operate('address',$post_data,true);
        }else{
            return $this->operate('address',$post_data,false);
        }
    }
    public function deleteaddress(){
        return $this->delete('address');
    }
}