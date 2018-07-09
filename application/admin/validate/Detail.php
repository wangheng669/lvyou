<?php

namespace app\admin\validate;

use think\Validate;

class Detail extends Validate
{
    protected $rule    = [
        'id'          => 'number',
        'title' => 'require',
        'category_id' => 'require',
        'address_id' => 'require',
        'desc' => 'require',
        'content' => 'require',
    ];
    protected $message = [
        'id.number' => '不能修改',
        'title.require' => '标题不能为空',
        'category_id.require' => '分类不能为空',
        'address_id.require' => '地点不能为空',
        'desc.require' => '简介不能为空',
        'content.require' => '内容不能为空',
    ];
}
