<?php

namespace app\index\validate;

use think\Validate;

class Join extends Validate
{
    protected $rule    = [
        'id'          => 'number',
        'name'     => 'require',
        'card'     => 'require',
        'tel'   => 'require|number|checkPhone',
        'outfit'     => 'require',
        'z_username' => 'require',
        'z_number' => 'require|number|checkPhone',
        //'z_card' => 'require',
        'address_id' => 'require'
    ];
    protected $message = [
        'id.number'           => '请勿修改',
        'name.require'     => '名字不能为空',
        'card.require'     => '身份证不能为空',
        'tel.require'       => '手机号不能为空',
        'job.require'     => '工作不能为空',
        'z_username.require'     => '联系人姓名不能为空',
        'z_number.require'     => '联系人手机号不能为空',
        //'z_card.require'     => '联系人身份证不能为空',
        'address_id' =>	'地址不能为空'
    ];

    protected function checkPhone($value){
		if(preg_match('/^((1[3,5,8][0-9])|(14[5,7])|(17[0,6,7,8])|(19[7]))\d{8}$/',$value)){

            return true;

       }else{

            return  '手机号码格式错误';

       }
   }
	
function checkIdCard($idCard){
$regIdCard="/^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/";
$idCard = strtoupper($idCard);// 强制转化大写
if(!preg_match($regIdCard, $idCard)) 
{ 
return false; 
}
if ( 18==strlen($idCard) ) {
$idCardWi = array( 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ); //将前17位加权因子保存在数组里
// $idCardY = array( 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ); //
$idCardY = array( 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ); //强制转化大写问题
$idCardWiSum = 0; //用来保存前17位各自乖以加权因子后的总和
for($i=0;$i<17;$i++){
// $idCardWiSum += substr($idCard,$i,1) * $idCardWi[$i];
$idCardWiSum += $idCard{$i} * $idCardWi[$i];
}
$idCardMod = $idCardWiSum%11;//计算出校验码所在数组的位置
$idCardLast = $idCard{17};//得到最后一位身份证号码
//如果等于2，则说明校验码是10，身份证号码最后一位应该是X

//用计算出的验证码与最后一位身份证号码匹配，如果一致，说明通过，否则是无效的身份证号码
if($idCardLast==$idCardY[$idCardMod]){
return true;
}else{
return false;
}
}elseif( 15 == strlen($idCard) ){
$NewIdCard = idcard_15to18($idCard);
return checkIdCard($NewIdCard);
}else{
return false;
}

}

	
}
