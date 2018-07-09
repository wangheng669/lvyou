<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    //定义规则
    protected $rule    = [
        //id
        'id'          => 'number',
        'category_name'     => 'require',
    ];
    protected $message = [
        'id.number'           => '请勿修改',
        'category_name.require'     => '内容不能为空',
    ];
}
