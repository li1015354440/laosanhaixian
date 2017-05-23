<?php
namespace Home\Controller;
use Home\Wxlogin\Wxlogin;
use Think\Controller;
class UserController extends Controller {
    //用户登录
    public function loginAction(){
        //拉起授权
        $wx = new  Wxlogin();
        $wx-> Oauth();
    }
    public function loginCallBackAction(){
        $code = $_GET['code'];
        $wx = new WxLogin();
        $res = $wx->getToken($code);
        $access_token = $res['access_token'];
        $openid = $res['openid'];
        $user_info = $wx->getUserInfo($access_token,$openid);
        //实例化模型并查询数据库中是否有数据
        $user =M('User');
        $data = ['open_id'=>$openid];
        $re = $user->where( $data)->find();
        if(!$re){
            $data['create_at'] =time();
            $data['update_at'] =time();
            $userid  = $user->add($data);
            $user_info['user_id'] =$userid;
            session('userinfo',$user_info);
            cookie('userinfo',$user_info);
        }else{
            $user_info['user_id']= $re['user_id'] ;
            session('userinfo' ,$user_info);
            cookie('userinfo',$user_info);
        }
        $this->redirect('Home/Shop/index');
    }

    //获取验证吗
    public function getCodeAction(){
        $tel = I('request.tel','');
        if($tel){

            if(time()-session('time') >60 ){
                $sms = new SMS();
                $res = $sms->GetCode($tel);
                session('time',time());
                if($res){
                    $this->ajaxReturn(['error'=>0 ,'message'=>'获取成功']);
                }else{
                    $this->ajaxReturn(['error'=>1,'message'=>'获取失败']);
                }
            }else{
                $this->ajaxReturn(['error'=>2 ,'message'=>'重复获取' ,'data'=>['mes'=>'请在60s之后重新获取']]);
            }
        }else{
            $this->ajaxReturn(['error'=>'3','message'=>'电话缺失']);
        }
    }
    //验证登陆
    public function checkCodeAction(){
        $tel =I('request.tel','');
        $code = I('request.code','');
        if($tel !== '' && $code !== ''){
            //实例化模型
            $sms = new SMS();
            $res = $sms->VerifyCode($tel,$code);
            $res=json_decode($res);
            if($res->code ==200){
                $model = M('User');
                $re = $model ->where(['tel'=>$tel])->find();

                if(!$re) {
                    $data = [
                        'create_at' => time(),
                        'update_at' => time(),
                        'tel' => $tel
                    ];
                    $userid = $model->add($data);
                    $data['user_id'] = $userid;
                    session('userinfo', $data);
                    cookie('userinfo',$data,3600*24*7);
                }else{
                    session('userinfo',$re);
                    cookie('userinfo',$re,3600*24*7);
                }
                $this->ajaxReturn(['error'=>0 ,'message'=>'验证成功', 'data'=>session('userinfo')]);
            }else{
                $this->ajaxReturn(['error'=>1 ,'message'=>'验证失败','data'=>'验证码错误']);
            }
        }else{
            $this->ajaxReturn(['error'=>2 ,'message'=>'参数缺失','data'=>'验证码或者电话缺失']);
        }
    }

    //添加地址
    public function addAddressAction(){
        if(IS_POST){
            if(!isset($_SESSION['userinfo'])){
                $data = ['error'=>1,'message'=>'用户未登录','url'=>U('User/login')];
                $this->ajaxReturn($data);
            }
            $recept_id = I('post.recept_id','');
            //判断参数是否完整
            if(isset($_POST['province_id']) && isset($_POST['city_id'])&& isset($_POST['country_id']) && isset($_POST['tel']) && isset($_POST['detail']) && isset($_POST['recept_name']) && isset($_POST['from'])){
                $_POST['user_id'] = session('userinfo.user_id');
                $_POST['is_default'] = 1;
                //保存数据
                $recept_model = D('Recept');
                if($recept_model->create()){
                    if($recept_id == ''){
                        $recept_id = $recept_model->add();
                    }else{
                        $recept_model->save();
                    }
                    //将最新加入的地址设为默认
                    $cond = [
                        'user_id' => session('userinfo.user_id'),
                        'is_default'    => '1',
                        'recept_id'    => ['neq', $recept_id],
                    ];
                    $recept_model->where($cond)->save(['is_default'=>0]);
                    switch ($_POST['from']){
                        case 'cart':
                            $this->ajaxReturn(['error'=>0,'message'=>'请求成功','url'=>U('Buy/pay',['from'=>'cart'])]);
                        break;
                        case 'my':
                            $this->ajaxReturn(['error'=>0,'message'=>'请求成功','url'=>U('User/addressList')]);
                        break;
                        case 'buy_now':
                            $goods_id = $_POST['goods_id'];
                            $quantity = $_POST['quantity'];
                            $this->ajaxReturn(['error'=>0,'message'=>'请求成功','url'=>U('Buy/pay',['goods_id'=>$goods_id,'quantity'=>$quantity,'from'=>'buy_now'])]);
                    }

                }else{
                    $err = $recept_model->getError();
                    $this->ajaxReturn(['error'=>'3','message'=>'参数错误','data'=>$err]);
                }
            }else{
                $this->ajaxReturn(['error'=>'2','message'=>'参数不完整']);
            }
        }else{
            $province = M('Region')
                ->field('region_id,title')
                ->where(['level'=>1])
                ->select();
            $this->assign('province_list',$province);
            $this->assign('from',I('get.from'));
            $this->assign('goods_id',I('get.goods_id',''));
            $this->assign('quantity',I('get.quantity',''));
            $receptId = I('request.recept_id','');
            if($receptId !='') {
                $where = ['recept.recept_id' => $receptId];
                //实例化模型
                $add = M('Recept');
                $recept = $add
                    ->alias('recept')
                    ->field('recept.*, province.title province ,city.title city ,country.title country')
                    ->join('ls_region province on province.region_id =recept.province_id')
                    ->join('ls_region city on city.region_id = recept.city_id')
                    ->join('ls_region country on country.region_id = recept.country_id')
                    ->where($where)
                    ->find();
                $this->assign('recept', $recept);
            }
            $this->display();
        }
    }
    //获取地区的接口
    public function getRegionAction(){
        $region_id = I('request.region_id','');
        if($region_id == ''){
            $this->ajaxReturn(['error'=>1,'message'=>'请求参数不完整']);
        }
        $city = M('Region')
            ->field('region_id,title')
            ->where(['parent_id'=>$region_id])
            ->select();
        if(!$city){
            $this->ajaxReturn(['error'=>2,'message'=>'获取数据失败']);
        }
        $this->ajaxReturn(['error'=>0,'message'=>'请求成功','data'=>$city]);
    }
//  显示全部地址
    public function addressListAction(){
        $userid = $_SESSION['userinfo']['user_id'];
        if($userid)
        {
            $where =[
                'ls_recept.user_id' =>$userid
            ];
            //实例模型
            $recept = M('Recept');
            $adds = $recept
                ->field('ls_recept.recept_id ,ls_recept.tel,ls_recept.detail, ls_recept.is_default,ls_recept.recept_name ,province.title province,city.title city ,country.title country')
                ->join('ls_region as province on ls_recept.province_id=province.region_id ')
                ->join('ls_region as city on ls_recept.city_id=city.region_id ')
                ->join('ls_region as country on ls_recept.country_id=country.region_id')
                ->where($where)->select();
            $this->assign('adds',$adds);
            $this->display();
        }else{
            redirect('login');
        }
    }
    //显示全部订单
    public function ordersAction(){
        $this->checkLogin();
        $orders =[];
           //实例化order模型
           $order = M('Order');
           $userid = $_SESSION['userinfo']['user_id'];
           $order_list = $order
               ->field('ls_order.order_id,ls_order_statu.order_statu_id,ls_order.user_id,ls_order.order_sn,ls_order.goods_info,ls_order.create_at,ls_order_statu.title')
               ->join('ls_order_statu on ls_order_statu.order_statu_id = ls_order.order_statu_id')
               -> where(['user_id'=>$userid])->select();

           foreach ($order_list as$key=> $value){
               $totalNum =0;
               $totalPrice =0;
               //获取商品信息并反序列化
               $goods_info = unserialize($value['goods_info']);
                //拼凑出总的数量和总价
                foreach ( $goods_info  as  $goods){
                    $totalNum +=$goods['buy_quantity'];
                    $totalPrice += $goods['buy_quantity']*$goods['shop_price'];
                }
               $value['goods_info'] = $goods_info;
               $value['totalPrice'] = $totalPrice;
               $value['totalNum'] = $totalNum;
               $orders[$key] =$value;
           }
//           echo '<pre>';
//           var_dump($orders);
//           die;
           $this->assign('orders',$orders);

           $this->display();
    }

    //整合订单的代码
    public function waitAction(){
        $userId =$_SESSION['userinfo']['user_id'];
        if($userId !=''){
            $orders =[];
                //实例化order模型
                $order = M('Order');
                $userid = $_SESSION['userinfo']['user_id'];
                $order_list = $order
                    ->field('ls_order.order_id,ls_order_statu.order_statu_id,ls_order.user_id,ls_order.order_sn,ls_order.goods_info,ls_order.create_at,ls_order_statu.title')
                    ->join('ls_order_statu on ls_order_statu.order_statu_id = ls_order.order_statu_id')
                    -> where(['user_id'=>$userid])->select();

                foreach ($order_list as$key=> $value){
                    $totalNum =0;
                    $totalPrice =0;
                    //获取商品信息并反序列化
                    $goods_info = unserialize($value['goods_info']);
                    //拼凑出总的数量和总价
                    foreach ( $goods_info  as  $goods){
                        $totalNum +=$goods['buy_quantity'];
                        $totalPrice += $goods['buy_quantity']*$goods['shop_price'];
                    }
                    $value['goods_info'] = $goods_info;
                    $value['totalPrice'] = $totalPrice;
                    $value['totalNum'] = $totalNum;
                    $orders[$key] =$value;
                }
                $unpays = getorders($orders,1);
                $this->assign('unpays',$unpays);
                $unsends = getorders($orders,2);
                $this->assign('unsends',$unsends);
                $undeliverys= getorders($orders,3);
                $this->assign('undeliverys',$undeliverys);
                $finnshorders = getorders($orders,4);
                $this->assign('finshorders',$finnshorders);
                $this->display();
        }else{
        $this->redirect('login') ;
        }
    }
     //取消订单
    public function deleteOrderAction(){
        //接收订单
        $orderId = I('request.ordersn','');
        if($_SESSION['userinfo']){
            if($orderId){
                //实例化订单模型
                $order = M('Order');
                $res = $order->where(['order_sn'=>$orderId])->delete();
                if($res){
                    $this->ajaxReturn(['error'=>0,'message'=>'取消订单成功']);
                }else{
                    $this->ajaxReturn(['error'=>4,'message'=>'取消订单失败']);
                }
            }else{
                $this->ajaxReturn(['error'=>2,'message'=>'缺少订单id']);
            }
        }else{
            $data=[
                'url'=>'User/login'
            ];
            $this->ajaxReturn(['error'=>1,'message'=>'未登录']);
        }
    }
    //确认收货
    public function confirmOrderAction(){
        //获取订单id
        //接收订单id
        $orderId = I('request.ordersn','');
        if($_SESSION['userinfo']){
            if($orderId){
                //实例化订单模型
                $order = M('Order');
                $res = $order->where(['order_sn'=>$orderId])->save(['order_statu_id'=>4]);
                if($res){
                    $this->ajaxReturn(['error'=>0,'message'=>'确认收货成功']);
                }else{
                    $this->ajaxReturn(['error'=>4,'message'=>'确认收货失败']);
                }
            }else{
                $this->ajaxReturn(['error'=>2,'message'=>'缺少订单id']);
            }
        }else{
            $this->ajaxReturn(['error'=>1,'message'=>'未登陆','url'=>'User/login']);
        }
    }
    //退出登陆
    public function outUserAction(){
        $_SESSION['userinfo']=null;
        cookie('userinfo',null);
        $res = $_SESSION['userinfo'];
        if($res ==''){
            $this->ajaxReturn(['error'=>0,'message'=>'退出登陆成功']);
        }else{
            $this->ajaxReturn(['error'=>200,'message'=>'退出登陆失败']);
        }
    }
    
//  判断是否登录
    public function mAction(){
        if($_SESSION['userinfo'])
        {
            $userInfo = session('userinfo');
            $this->ajaxReturn(['error'=>0,'message'=>'登陆成功状态' ,'data'=>$userInfo]);
        }elseif($_COOKIE['userinfo']){
        	$userInfo = cookie('userinfo');
        	session('userinfo',$userInfo);
        	$this->ajaxReturn(['error'=>0,'message'=>'登陆成功状态' ,'data'=>$userInfo]);
        }else{
            $data= [
                'statu'=>'未登录状态',
            ];
            $this->ajaxReturn(['error'=>1,'message'=>'未登陆' ,'data'=>$data]);
        }
    }
    //我的页面
    public function myAction(){
        $this->display();
    }
    //订单详情业
   public function orderDetailAction(){
        //接收订单的id
        $order_sn = I('request.order_sn','');
        if($order_sn !=''){
            //实例化模型
            $order = M('Order');
            $where = ['order_sn'=>$order_sn];
            $res =  $order
                ->field('order_sn,goods_info,create_at,comment,recept_info')
                ->where($where)
                ->find();
            $recept_info = unserialize($res['recept_info'])[0];
            $goods_info = unserialize($res['goods_info']);
            $res['goods_info'] = $goods_info;
            $res['recept_name'] = $recept_info['recept_name'];
            $res['tel'] = $recept_info['tel'];
            $res['province'] = $recept_info['province'];
            $res['city'] = $recept_info['city'];
            $res['country'] = $recept_info['country'];
            $res['detail'] = $recept_info['detail'];
            $totalNum =0;
            $totalPrice = 0;
            foreach ($res['goods_info'] as $v) {
                $totalNum += $v['buy_quantity'];
                $totalPrice +=  $v['buy_quantity']* $v['shop_price'];
            }
            $res['totalNum']=$totalNum;
            $res['totalPrice'] = $totalPrice;
            $this->assign('detail',$res);
            $this->display();
        }else{
            $this->redirect('orders');
        }
    }
    //删除收货地址
    public function deleteAddressAction(){
        $recept_id = I('request.recept_id');
        if($recept_id){
            //实例化模型recept
            $recept = M('Recept');
            //判断是否是默认的
            $is_default = $recept->getFieldByreceptId($recept_id,'is_default');
            if($is_default == 0){
            	$res = $recept->where(['recept_id'=>$recept_id])->delete();
            }else{
            	$res = $recept->where(['recept_id'=>$recept_id])->delete();
            	$recept_pk = $recept->field('recept_id')->where(['user_id'=>session('userinfo.user_id')])->find();
	            if($recept_pk){
	            	$recept->where(['recept_id'=>$recept_pk['recept_id']])->save(['is_default'=>1]);
	            }
            }
            
            $this->redirect('addressList');
        }else{
            $this->redirect('addressList');
        }
    }
}