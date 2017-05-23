<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 1:33
 */
namespace Back\Controller;
use Think\Controller;
class CodeController extends Controller
{
    function setAction(){
    	$this->checkLogin();
        if(IS_POST){
            //表名
            $table = I('post.table');
            //表备注
            $comment = I('post.comment');
            //ucfirst
            $model_name = $controller_name = implode(array_map('ucfirst',explode('_',$table)));
            $model = M($model_name);
            //$fields = $model->getDbFields();
            $fields = I('post.fields');
            $pk = $model->getPk();
            //替换生成控制器代码
            $template_file = APP_PATH.'Back/CodeTemplate/Controller.template';
            $template = file_get_contents($template_file);
            //var_dump($template);die;
            $search = ['%CONTROLLER%','%MODEL%','%PK_FIELD%'];
            $replace = [$controller_name,$model_name,$pk];
            $content = str_replace($search,$replace,$template);
            $controller_file = APP_PATH.'Back/Controller/'.$controller_name.'Controller.class.php';
            file_put_contents($controller_file,$content);
            echo  $controller_file .'控制器生成完毕！<br>';
            //替换生成模型代码
            $template_file = APP_PATH.'Back/CodeTemplate/Model.template';
            $template = file_get_contents($template_file);
            //dump($template);die;
            $search = ['%MODEL%'];
            $replace = [$model_name];
            $content = str_replace($search,$replace,$template);
            $model_file = APP_PATH.'Back/Model/'.$model_name.'Model.class.php';
            file_put_contents($model_file,$content);
            echo $model_file .'模型生成完毕！<br>';
            //生成视图页面
            $template_path = APP_PATH.'Back/View/'.$model_name;
            //没有相应的视图文件夹就创建
            if(!is_dir($template_path)){
                mkdir($template_path);
            }
            //生成list页面表头部分
            $field_head_list = $field_value_list = '';
            foreach ($fields as $options){
                //dump($fields);die;
                if(isset($options['list'])){
                    if(isset($options['sort'])){
                        $template_file = APP_PATH.'Back/codeTemplate/fieldHeadSort.template';
                    }else{
                        $template_file = APP_PATH.'Back/codeTemplate/fieldHead.template';
                    }
                    //替换
                    $template = file_get_contents($template_file);
                    $search = ['%FIELD%','%FIELD_COMMENT%'];
                    $replace = [$options['name'],$options['comment']];
                    $content = str_replace($search,$replace,$template);
                    $field_head_list .= $content;
                }
                //生成list页面的值列表部分
                if(isset($options['list'])){
                    $template_file =  APP_PATH.'Back/codeTemplate/fieldValue.template';
                    $template = file_get_contents($template_file);
                    $search = ['%FIELD%'];
                    $replace = [$options['name']];
                    $content = str_replace($search,$replace,$template);
                    $field_value_list .= $content;
                }
            }

            //替换list整体模板
            $template_file = APP_PATH.'Back/codeTemplate/list.template';
            $template = file_get_contents($template_file);
            $search = ['%COMMENT%','%FIELD_HEAD_LIST%','%FIELD_VALUE_LIST%','%PK_FIELD%'];
            //dump($comment);die;
            $replace = [$comment,$field_head_list,$field_value_list,$pk];
            $content = str_replace($search,$replace,$template);
            $list_file = $template_path.'/list.html';
            file_put_contents($list_file,$content);
            echo $list_file . '生成完毕！<br>';
            //生成set模版
            $field_set_list = '';
            foreach ($fields as $options){
                if(isset($options['set'])){
                    $template_file =  APP_PATH.'Back/codeTemplate/fieldSet.template';
                    $template = file_get_contents($template_file);
                    $search = ['%FIELD%','%FIELD_COMMENT%'];
                    $replace = [$options['name'],$options['comment']];
                    $content = str_replace($search,$replace,$template);
                    $field_set_list .= $content;
                }
            }
            //set整体替换
            $template_file = APP_PATH.'Back/codeTemplate/set.template';
            $template = file_get_contents($template_file);
            $search = ['%PK_FIELD%','%COMMENT%','%FIELD_SET_LIST%','%PK_FIELD%'];
            $replace = [$pk,$comment,$field_set_list,$pk];
            $content = str_replace($search,$replace,$template);
            $set_file  = $template_path .'/set.html';
            file_put_contents($set_file,$content);
            echo $set_file.'生成完毕！<br>';
        }else{
            $this->display();
        }
    }
    public function ajaxAction(){
        $table = I('get.table');
        $model_name = $controller_name = implode(array_map('ucfirst',explode('_',$table)));
        $model = M($model_name);
        $fields = $model->getDbFields();
        $pk_field = $model->getPk();
        $this->ajaxReturn(['fields'=>$fields,'pk_field'=>$pk_field]);
    }
}