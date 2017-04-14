<?php
namespace Home\Controller;
use Think\Controller;
class SteplineController extends Controller {
    public function index(){

        $step = D('stepline');
        $data = $step->getMovedata();

        foreach ($data as $k => $v) {
            $data1['success'][$k] = $v['success'];
            $data1['weixin'][$k] = $v['weixin'];
            $data1['paper'][$k] = $v['paper'];
            $data1['createtime'][$k] = $v['createtime'];
        }
        $data1 = json_encode($data1);
        $this->assign(array(
            'data1' => $data1,
        ));
        $this->display();

    }
    public function getpayajax(){
        if (IS_POST){
                $step = D('stepline');
                $step->addData();
        }
        if(IS_GET){
            $step = D('stepline');
            $data = $step->getMovedata();
            $data = array_reverse($data);
            foreach ($data as $k => $v) {
                $data1['success'][$k] = $v['success'];
                $data1['weixin'][$k] = $v['weixin'];
                $data1['paper'][$k] = $v['paper'];
                $data1['createtime'][$k] = $v['createtime'];
            }
            $data1 = json_encode($data1);
            echo $data1;

            if ($_GET['paper']==1){
                $step = D('stepline');
                $step->addData();
            }
            if ($_GET['type']==1){
                $step = D('stepline');
                $step->addSecData();
            }
            if ($_GET['delete']==1){
                $step = D('stepline');
                $step->clearall();
            }
        }

    }

    public function getPaper(){
        if (IS_GET){
            $step = D('stepline');
            $step->addData();
        }
    }
}