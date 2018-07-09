<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    //定义规则
    protected $rule    = [
        'id'          => 'number',
        'username' => 'require',
        'password' => 'require',
    ];
    protected $message = [
        'username.require' => '管理员名称不能为空',
        'password.require'     => '密码不能为空',
    ];
}
