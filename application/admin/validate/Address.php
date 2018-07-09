<?php

namespace app\admin\validate;

use think\Validate;

class Address extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'          => 'number',
        'address_name'     => 'require',
    ];
    protected $message = [
        'id.number'           => '请勿修改',
        'address_name.require'     => '地点不能为空',
    ];
}
