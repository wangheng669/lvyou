<?php

namespace app\index\controller;

use app\index\common\Base;

class Detail extends Base
{   
    public function index($id=1)
    {
        $detail = model('Detail')->find($id);
        $scenic = explode('|',$detail['scenic']);
        return $this->fetch('',[
            'banner' => $this->banner,
            'detail' =>$detail,
            'scenic' =>$scenic
        ]);
    }
}
