<?php

namespace app\admin\validate;

use think\Validate;

class Banner extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'    => 'number',
        'is_active'  => 'require|number',
    ];
    protected $message = [
        'id.number'     => '请勿修改',
        'is_active'      => '请填写正确的',
    ];
}
