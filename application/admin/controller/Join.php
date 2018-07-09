<?php

namespace app\admin\controller;

use app\admin\common\Base;

use PHPExcel_IOFactory;
use PHPExcel;

class Join extends Base
{
    public function index(){
        $data = request()->param();
        $data['address_id'] = 0;
        if($data['address_id']){
            $joinList=model('join')->where('address_id','=',$data['address_id'])->select();
            $joinCount=model('join')->where('address_id','=',$data['address_id'])->count();
        }else{
            $joinList=model('join')->select();
            $joinCount=model('join')->count();
        }
        $address=model('Address')->select();
        return $this->fetch('join-list',[
            'joinList'=>$joinList,
            'joinCount'=>$joinCount,
            'address'=>$address,
            'address_id'=>$data['address_id']
        ]);
    }
    public function joinEdit($id)
    {
        $joinEdit=model('join')->get($id);
        return $this->fetch('join-edit',[
            'joinEdit'=>$joinEdit,
        ]); 
    }
    public function send(){
        $send=model('send')->find();
        return $this->fetch('send',[
            'send'=>$send,
        ]);
    }
    public function saveSend(){
        $post_data=request()->post();
        if(isset($post_data['id']))
        {
            return $this->operate('send',$post_data,true);
        }else{
            return $this->operate('send',$post_data,false);
        }
    }
    public function deletejoin(){
        return $this->delete('join');
    }
    public function excel(){
        $path = dirname(__FILE__); //找到当前脚本所在路径
        $PHPExcel = new PHPExcel(); //实例化PHPExcel类，类似于在桌面上新建一个Excel表格
        $PHPSheet = $PHPExcel->getActiveSheet(); //获得当前活动sheet的操作对象
        $PHPSheet->setTitle('报名表'); //给当前活动sheet设置名称
        $data = model('Join')->select();// 获取要导出的数据
        $PHPSheet->setCellValue('A1', 'ID')
        ->setCellValue('B1', '姓名')
        ->setCellValue('C1', '手机号')
        ->setCellValue('D1', '身份证')
        ->setCellValue('E1', '地点')
        ->setCellValue('F1', '护照号码')
        ->setCellValue('G1', '护照有效期')
        ->setCellValue('H1', '护照英文姓')
        ->setCellValue('I1', '护照英文名')
        ->setCellValue('J1', '任职机构')
        ->setCellValue('K1', '职务')
        ->setCellValue('L1', '联系人')
        ->setCellValue('M1', '联系人手机号');
        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($data);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $PHPSheet->setCellValue('A' . $i, $data[$i-2]['id']);
            $PHPSheet->setCellValue('B' . $i, $data[$i-2]['name']);
            $PHPSheet->setCellValue('C' . $i, $data[$i-2]['card']);
            $PHPSheet->setCellValue('D' . $i, $data[$i-2]['tel']);
            $PHPSheet->setCellValue('E' . $i, $data[$i-2]['address_id']);
            $PHPSheet->setCellValue('F' . $i, $data[$i-2]['pass_num']);
            $PHPSheet->setCellValue('G' . $i, $data[$i-2]['pass_term']);
            $PHPSheet->setCellValue('H' . $i, $data[$i-2]['pass_last']);
            $PHPSheet->setCellValue('I' . $i, $data[$i-2]['pass_first']);
            $PHPSheet->setCellValue('J' . $i, $data[$i-2]['outfit']);
            $PHPSheet->setCellValue('K' . $i, $data[$i-2]['job']);
            $PHPSheet->setCellValue('L' . $i, $data[$i-2]['z_username']);
            $PHPSheet->setCellValue('M' . $i, $data[$i-2]['z_number']);
        }
        $PHPWriter = PHPExcel_IOFactory::createWriter($PHPExcel,'Excel2007');//按照指定格式生成Excel文件，'Excel2007'表示生成2007版本的xlsx，
        $PHPWriter->save('../public/报名表.xlsx'); //表示在$path路径下面生成报名表.xlsx文件
        return [
            'msg' => '/报名表.xlsx',
            'status' => 4,
        ];
    }
}