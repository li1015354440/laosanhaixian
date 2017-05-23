<?php
namespace Home\Model;
use Think\Model;
/*
 *品牌模型
 */
class AskModel extends Model{
	//自动验证
	//[验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    protected $patchValidate = true;
    protected $_validate =[
        ['topic_title','require','咨询主题未填写'],
        ['content','require','咨询内容未填写'],
        ['fname','require','未填写姓氏'],
        ['lname','require','未填写名字'],
        ['email','require','邮箱未填写'],
        ['emai','email','邮箱格式不正确'],
    ];
	//自动完成
	//[完成字段,完成规则,[完成条件,附加规则]]
    protected $_auto = [
        ['create_at','time',self::MODEL_INSERT,'function'],
        ['update_at','time',self::MODEL_BOTH,'function'],
    ];
}