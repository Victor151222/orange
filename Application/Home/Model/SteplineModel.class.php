<?php
namespace Home\Model;
use Think\Model;
class SteplineModel extends Model
{
//	protected $insertFields = array('category','bcategory','bcategory','bdata');
	// 添加和修改管理员时使用的表单验证规则
//	protected $_validate = array(
//        array('category','require','业务类型不能为空！'),
//        array('bcategory','require','子业务不能为空！'),
//        array('bcategory','require','地区不能为空！'),
//        array('bdata','require','业务数量不能为空!'),
//        array('bdata',array(1,10000),'业务数量请输正整数！',1,'between'),
//	);
	/************************************ 其他方法 ********************************************/

    // 初始化数据
    function getMovedata(){
        $array = $this->order('id desc')->limit(5)
                      ->select();
        return $array;
    }
    // 得到最新的一条数据
    function getNewdata(){
        $array = $this->order('id desc')->limit(1)
            ->select();
        return $array;
    }
    function addData(){
            $data['success'] = 600;//500
            $data['weixin'] = 300;//300
            $data['paper'] = 200;//100
            $this->add($data);
    }
    function addSecData(){
        $data['success'] = 500;//500
        $data['weixin'] = 300;//300
        $data['paper'] = 100;//100
        $this->add($data);
    }
    public function clearall() {
//        $row=$this->query("truncate orange stepline");
        $this->order('id')->limit(40)->delete();
    }
}