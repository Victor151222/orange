<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
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
        $this->assign(array(
            'data1' => $data1,
        ));

        $this->display('Stepline:index');
    }
}