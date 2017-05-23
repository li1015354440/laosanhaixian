<?php
namespace Home\Wxlogin;
/**
 *
 */
class Wxlogin
{
    protected $appid = 'wx5e9738282c2778cd';
    protected $secret = '5946767ec0c0a9883c487f91a5edae45';
    protected $redirect = 'http://www.zhonghenganyuan.com/laosan/index.php/Home/User/LoginCallBack';
    public function Oauth(){
        $oauth_url  = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.$this->redirect.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        header("Location:".$oauth_url);
    }
    public function getToken($code){
        $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->secret.'&code='.$code.'&grant_type=authorization_code';
        return $this->request($get_token_url);
    }
    public function getUserInfo($access_token,$openid){
        $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
        return $this->request($get_user_info_url);
    }
    public function request($url){
        $fp = curl_init();
        curl_setopt($fp,CURLOPT_URL,$url);
        curl_setopt($fp,CURLOPT_HEADER,0);
        curl_setopt($fp, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($fp, CURLOPT_CONNECTTIMEOUT, 10);
        $res = curl_exec($fp);
        curl_close($fp);
        return json_decode($res,true);
    }
}