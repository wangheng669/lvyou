<?php
namespace app\index\controller;

use app\index\common\Base;

class Index extends Base
{
    public function index()
    {
        // 获取全部内容
        $detail = model('detail')->select();
        return $this->fetch('index',[
            'banner' => $this->banner,
            'category' => $this->category,
            'detail' => $detail,
        ]);
    }
}
