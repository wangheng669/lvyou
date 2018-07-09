<?php

namespace app\common\model;

use think\Model;

class Join extends Model
{
    protected function getAddressIdAttr($value)
    {
        $address = model('address')->find($value);
        return $address['address_name'];
    }
}
