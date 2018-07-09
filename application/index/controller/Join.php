<?php

namespace app\index\controller;

use app\index\common\Base;

use app\index\extra\ChuanglanSmsHelper\ChuanglanSmsApi;


class Join extends Base
{
    public function index($id='')
    {
        $addressList=model('address')->select();
        return $this->fetch('index',[
            'addressList' => $addressList,
            'id' => $id
        ]);
    }
    public function enroll()
    {
        $post_data = input("post.");
        //var_dump($post_data);
        //exit;
        if($post_data){
	       $num=count($post_data['name']);
	        for($i=0;$i<$num;$i++){
	            foreach($post_data as $k=>$v){
	                @$data[$i][$k]=$v[$i];
	                $data[$i]['z_username']=$post_data['z_username'];
	                $data[$i]['z_number']=$post_data['z_number'];
	                //$data[$i]['z_card']=$post_data['z_card'];
	                $data[$i]['address_id']=$post_data['address_id'];
	                $data[$i]['create_time'] = time();
	            }
	            $validate = validate('Join');
	            if(!$validate->check($data[$i])){
	                $msg = $validate->getError();
	               	return $msg;
	            }
	        }
	        $res = model('Join')->insertAll($data);
	        if($res){
	            $send = model('Send')->find();
	            $user_msg = "尊敬的{$post_data['z_username']}用户您好，您已经报名成功。";
	            $res = $this->SendJoin($post_data,$user_msg);
	            $admin_data['z_number'] =  $send->tel;
	            $admin_msg = "管理员您好，{$post_data['z_username']}报名成功";
	            $res = $this->SendJoin($admin_data,$admin_msg);
	            echo "<script>alert('报名成功');window.history.go(-1)</script>";
	        }else{
	            return "未知错误!!!";
	        } 
	        }else{
	            return "没有数据";
	        }
        
    }
    public function SendJoin($post_data,$msg)
    {
        // 发送短信
        $clapi  = new ChuanglanSmsApi();
        $result = $clapi->sendSMS($post_data['z_number'],$msg);
        if(!is_null(json_decode($result))){
            $output=json_decode($result,true);
            if(isset($output['code'])  && $output['code']=='0'){
                return '短信发送成功！' ;
            }else{
                return $output['errorMsg'];
            }
        }else{
                return $result;
        }
    }
}
