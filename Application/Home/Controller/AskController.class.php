<?php
namespace Home\Controller;
use Think\Controller;

class AskController extends Controller{
//添加用户留言
    public function setAction(){
        if(IS_POST){
            if(isset($_POST['topic_title']) && $_POST['topic_title'] && isset($_POST['content'])&&$_POST['content'] && isset($_POST['fname']) && $_POST['fname'] && isset($_POST['lname']) && $_POST['lname'] && isset($_POST['email'])&&$_POST['email']){
                $model=D('Ask');
                if($model->create()) {
                    $ask_id = $model->add();
                    if ($ask_id > 0) {
                        $this->ajaxReturn(['error' => 0, 'message' => '添加成功']);
                    }
                }
            }else{
                $this->ajaxReturn(['error' => 1, 'message' => '参数不完整']);
            }
        }else{
            $this->display();
        }
    }
}

