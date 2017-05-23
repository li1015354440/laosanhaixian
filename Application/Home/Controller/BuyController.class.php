<?php
namespace Home\Controller;
use Home\Cart\Cart;
use Think\Controller;
class Buycontroller extends Controller{
    //显示购物车
    public function cartAction(){
        if(!isset($_SESSION['userinfo'])){
           if(isset($_COOKIE['userinfo'])){
                $userinfo= cookie('userinfo');
                session('userinfo',$userinfo);
           }else{
             redirect('../User/login');
            }
        }
        $cart = Cart::instance();
        $cart_list = $cart->getFullGoodsList();
       // var_dump($cart_list);die;
        $this->assign('cart_list',$cart_list);
        $this->display();
    }

    //添加商品入购物车
    public function cartaddAction(){
        //用户未登录的验证
        if(!isset($_SESSION['userinfo'])){
            $data = ['error'=>1,'message'=>'用户未登录','url'=>U('User/login')];
            $this->ajaxReturn($data);
        }
        //获取goods_id及数量
        $goods_id = I('request.goods_id','');
        $quantity = I('request.quantity','');
        if($goods_id == '' || $quantity == '' ){
            $data = ['error'=>2,'message'=>'请求参数不完整'];
            $this->ajaxReturn($data);
        }
        if($quantity == 0){
            $data = ['error'=>3,'message'=>'数量不能为0'];
            $this->ajaxReturn($data);
        }
        $cart = Cart::instance();
        $res = $cart->addGoods($goods_id,$quantity);
        if($res){
            $data = ['error'=>0,'message'=>'添加购物车成功'];
            $this->ajaxReturn($data);
        }else{
            $data = ['error'=>4,'message'=>'未知错误'];
            $this->ajaxReturn($data);
        }
    }


    //移除购物车中的商品
    public function cartRemoveAction(){
        $goods_id = I('request.goods_id','');
        if($goods_id == ''){
            $this->ajaxReturn(['error'=>2,'message'=>'请求参数不完整']);
        }
        $cart = Cart::instance();
        $res = $cart->deletGoods($goods_id);
        if(!$res){
            $this->ajaxReturn(['error'=>3,'message'=>'不存在该商品']);
        }
        $this->ajaxReturn(['error'=>0,'message'=>'删除成功']);
    }
    //购物车中商品数量的更新
    public function cartUpdateAction(){
        if(!isset($_SESSION['userinfo'])){
            $this->ajaxReturn(['error'=>1,'message'=>'用户未登录','url'=>U('User/login')]);
        }
        $data = I('request.data',[]);
        if(!$data){
            $this->ajaxReturn(['error'=>2,'message'=>'请求参数不完整']);
        }
        if(!is_array($data)){
            $this->ajaxReturn(['error'=>3,'message'=>'请求数据格式错误']);
        }
        $cart = Cart::instance();
        foreach ($data as $value){
            $goods_key = $value['key'];
            $quantity = $value['quantity'];
            $res = $cart->updateQuantity($goods_key, $quantity);
            if ($res === false){
                $this->ajaxReturn(['error'=>4,'message'=>'更新商品数量失败']);
            }
        }
        $this->ajaxReturn(['error'=>0,'message'=>'更新商品数量成功','url'=>U('Buy/pay',['from'=>'cart'])]);
    }

    //购物车选中商品
    public function checkGoodsAction(){
        if(!isset($_SESSION['userinfo'])){
            $this->ajaxReturn(['error'=>1,'message'=>'用户未登录','url'=>U('User/login')]);
        }
        $cart = Cart::instance();
        $goods_keys = I('request.goods_keys', []);
        if(!$goods_keys){
            $this->ajaxReturn(['error'=>2,'message'=>'请求参数不完整']);
        }
        if(!is_array($goods_keys)){
            $this->ajaxReturn(['error'=>3,'message'=>'请求数据格式不正确']);
        }
        $cart->setChecked($goods_keys);
        $this->ajaxReturn(['error'=>0,'message'=>'设置选中商品成功']);
    }

    //获取当前用户的收货地址列表信息
    public function getRecept($default){
        if($default == 'default'){
            $condition = ['user_id'=>session('userinfo.user_id'),'is_default'=>1];
        }else{
            $condition = ['user_id'=>session('userinfo.user_id')];
        }
        $recept_list = M('Recept')
            ->alias('rec')
            ->field('recept_id,user_id,is_default,detail,recept_name,tel,pr.title as province,cty.title as city,cou.title as country')
            ->join('left join __REGION__ pr on pr.region_id = rec.province_id')
            ->join('left join __REGION__ cty on cty.region_id = rec.city_id')
            ->join('left join __REGION__ cou on cou.region_id = rec.country_id')
            ->where($condition)
            ->limit()
            ->select();
       // var_dump($recept_list);
        return $recept_list;
    }

    //显示购买的页面
    public function payAction(){
        //判断用户是否登录
        if(!isset($_SESSION['userinfo'])){
            $data = ['error'=>1,'message'=>'用户未登录','url'=>U('User/login')];
            $this->ajaxReturn($data);
        }
        //请求参数验证
        $from = I('get.from','buy_now');
        //是否从购物车跳转拼接不同的条件
        if($from == 'cart'){
            $goods_ids = [];
            $cart = Cart::instance();
            $goods_list = $cart->getGoodsList();
            foreach ($goods_list as $key=>$value){
                if($value['checked'] == 1){
                    array_push($goods_ids,$key);
                }
            }
            $goods_ids = implode(',',$goods_ids);
            $condition = ['goods_id'=>['in',$goods_ids]];
            //var_dump($condition);die;
        }else{
            $goods_id = I('get.goods_id','');
            if($goods_id == ''){
                $data = ['error'=>2,'message'=>'请求参数不完整'];
                $this->ajaxReturn($data);
            }
            $condition = ['goods_id'=>$goods_id];
        }
        //获取生成订单的商品信息
        $order_list = M('Goods')
            ->field('goods_id,name,shop_price,thumb,u.title as unit_title')
            ->join('left join __UNIT__ u using(unit_id)')
            ->where($condition)
            ->select();
        //拼上购买数量并计算商品总价
        if($from == 'cart'){
            $row = [];
            $total_price = 0;
            foreach ($order_list as $order) {
                $data = $order;
                $data['buy_quantity'] = $goods_list[$order['goods_id']]['buy_quantity'];
                array_push($row,$data);
                $total_price += $data['buy_quantity']*$data['shop_price'];
            }
            $this->assign('from',$from);
            $this->assign('addAddress_url',U('User/addAddress',['from'=>'cart']));
            $this->assign('total_price',$total_price);
//            var_dump($row);die;
            $this->assign('order_list',$row);
        }else{

            $order_list[0]['buy_quantity'] = I('get.quantity');
//            var_dump($order_list);die;
            $total_price = $order_list[0]['shop_price'] * $order_list[0]['buy_quantity'];
            $this->assign('from',$from);
            $this->assign('addAddress_url',U('User/addAddress',['from'=>'buy_now','goods_id'=>I('get.goods_id'),'quantity'=>I('get.quantity')]));
            $this->assign('total_price',$total_price);
            $this->assign('order_list',$order_list);
        }
        $recept_list = $this->getRecept();
        $recept_default = $this->getRecept('default');
        $this->assign('recept_default',$recept_default[0]);
        $this->assign('recept_list',$recept_list);
//        var_dump($recept_list);die;
        $this->display();
    }

    //生成订单
    public function orderGenerationAction(){
        $from = I('request.from','');
        if($from == 'cart'){
            $cart = Cart::instance();
            $goods_list = $cart->getFullGoodsList('checked');
            //判断库存是否充足

            foreach ($goods_list as $goods){
                $goods_id = $goods['goods_id'];
                $stock = M('Goods')->getFieldByGoodsId($goods_id,'stock');
                if ($goods['buy_quantity'] > $stock){
                    $this->ajaxReturn(['error'=>3,'message'=>'库存不足']);
                }
            }
        }else{
            $goods_id = I('post.goods_id','');
            $quantity = I('post.quantity','');
            if($goods_id == '' || $quantity == ''){
                $this->ajaxReturn(['error'=>2,'messsage'=>'请求参数不完整']);
            }
            $goods_model = M('Goods');
            $stock = $goods_model->getFieldByGoodsId($goods_id,'stock');
            if ($quantity > $stock){
                $this->ajaxReturn(['error'=>3,'message'=>'库存不足']);
            }
            $goods_info = $goods_model
                ->field('goods_id,name,thumb,shop_price,u.title as unit_title')
                ->join('left join __UNIT__ u using(unit_id)')
                ->find($goods_id);
            $goods_info['buy_quantity'] = $quantity;
            $goods_list = [];
            $goods_list[0] =$goods_info;
        }
        //拼凑商品基本信息
        $recept_id = I('post.recept_id','');
        if($recept_id == ''){
        	$this->ajaxReturn(['error'=>6,'messsage'=>'请求参数不完整']);
        }
        $recept_info = M('Recept')
            ->alias('rec')
            ->field('detail,recept_name,tel,pr.title as province,cty.title as city,cou.title as country')
            ->join('left join __REGION__ pr on pr.region_id = rec.province_id')
            ->join('left join __REGION__ cty on cty.region_id = rec.city_id')
            ->join('left join __REGION__ cou on cou.region_id = rec.country_id')
            ->where(['recept_id'=>$recept_id])
            ->limit()
            ->select();
        $comment = I('post.comment');
        $data['goods_info'] = serialize($goods_list);
        $data['user_id'] = session('userinfo.user_id');
        $data['order_sn'] = date('YmdHis',time()).mt_rand(100,999).mt_rand(100.999).mt_rand(100,999);
        $data['recept_info']=serialize($recept_info);
        $data['comment'] = $comment;
        $data['order_statu_id'] = 1;
        $data['create_at'] = time();
        $data['update_at'] = time();
        $order_model = D('Order');
        if($order_model->create($data)){
            //将用户选择的地址设为默认地址，其他地址设为非默认
            $recept_model = M('Recept');
            $recept_model->where(['recept_id'=>$recept_id])->save(['is_default'=>1]);
            $cond = [
                'user_id' => session('userinfo.user_id'),
                'is_default'    => '1',
                'recept_id'    => ['neq', $recept_id],
            ];
            $recept_model->where($cond)->save(['is_default'=>0]);
            $order_id = $order_model->add($data);

            if($order_id>0){
                if($from == 'cart'){
                    //添加订单成功删除购物车中商品
                    foreach ($goods_list as $goods){
                        $cart->deletGoods($goods['goods_id']);
                    }
                }
                $this->ajaxReturn(['error'=>0,'message'=>'添加订单成功','url'=>U('Pay/index',['order_sn'=>$data['order_sn']])]);
            }
           $this->ajaxReturn(['error'=>5,'message'=>'数据库内部错误']);
        }else{
            $this->ajaxReturn(['error'=>4,'message'=>'订单添加失败','data'=>$order_model->getError()]);
        }
    }

    //支付
    public function confirmAction(){
        $order_sn = I('get.order_sn','');
        $order = M('order')->where(['order_sn'=>$order_sn])->find();
            $goods_info = unserialize($order['goods_info']);
            $total_price = 0;
            static $goods_des = [];
            foreach ($goods_info as $goods){
                $total_price += $goods['shop_price'] * $goods['buy_quantity'];
                $goods_des[] = $goods['name'].'*'.$goods['buy_quantity'];
            }
        if($order_sn == '' || $order_sn == 'undefined'){
            $this->redirect('User/wait/id/1');
        }
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
           //微信浏览器
            $this->assign('total_price',$total_price);
            $this->assign('order_sn',$order_sn);
            $this->display('Buy/tip');
        }else{
            $goods_des = implode(',',$goods_des);
            //订单号必须
            $data['WIDout_trade_no']=$order_sn;
            //订单名称，必填
            $data['WIDsubject']="Baobaowan商城订单";
            //付款金额，必填
            $data['WIDtotal_amount'] = $total_price;
            //商品描述，可空
            $data['WIDbody']= $goods_des;
            $this->assign('data',$data);
            $this->display();
        }
    }
    //支付成功修改订单状态
    public function morderAction(){
        $order_sn = I('get.order_sn');
        $order_model =  M('Order');
        $goods_info = $order_model->field('goods_info')->where(['order_sn'=>$order_sn])->find();
        $goods_info = unserialize($goods_info['goods_info']);
        $goods_model = M('Goods');
        foreach($goods_info as $goods){
        	var_dump($goods['goods_id']);
        	var_dump($goods['buy_quantity']);
        	$goods_model->where(['goods_id'=>$goods['goods_id']])->setDec('stock',$goods['buy_quantity']);
        }
        $res = $order_model->where(['order_sn'=>$order_sn])->save(['order_statu_id'=>2]);
        if($res !== false){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function listenOrderAction(){
        $order_sn = I('request.order_sn','');
        $total_price = I('request.total_price');
        if($order_sn == ''){
            $this->ajaxReturn(['error'=>1,'message'=>'请求参数不完整','order_sn'=>$order_sn]);
        }
        $res = M('Order')->getFieldByOrderSn($order_sn,'order_statu_id');
        if($res == null){
            $this->ajaxReturn(['error'=>2,'message'=>'订单号不存在']);
        }
        if($res ==1){
            $this->ajaxReturn(['status'=>'fail','message'=>'支付未完成']);
        }
        $this->ajaxReturn(['status'=>'success','message'=>'支付成功','url'=>U('Buy/complete',['order_sn'=>$order_sn,'total_price'=>$total_price,'time'=>date('Y-m-d',time())])]);
    }
    //显示完成支付的页面
    public function finishpayAction(){
        $total_price = I('get.total_price');
        $this->assign('total_price',$total_price);
        $this->display();
    }

    //微信页内支付成功
    public function completeAction(){
        $total_price = I('request.total_price');
        $time = I('request.time');
        $order_sn = I('request.order_sn');
        $this->assign('time',$time);
        $this->assign('total_price',$total_price);
        $this->assign('order_sn',$order_sn);
        $this->display();
    }
}