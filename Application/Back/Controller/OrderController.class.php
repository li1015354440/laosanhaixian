<?php
namespace Back\Controller;
use Think\Controller;
use Think\Page;

class OrderController extends Controller{

    /**
     *列表展示
     */
    public function listAction()
    {
        $this->checklogin();
        $model = M('Order');
        $condition = [];
        $sort['filed'] = I('get.filed', 'sort_number');
        $sort['type'] = I('get.type', 'asc');
        $order = "`{$sort['filed']}` {$sort['type']}";
        $this->assign('sort', $sort);
        //筛选条件
        $title = $filter['order_statu_id'] = I('get.order_statu_id', '');
        $site = $filter['order_sn'] = I('get.order_sn', '');
        if ($title != '') {
            $condition['title'] = $title;
        }
        if ($site != '') {
            $condition['site'] = $site;
        }
       $this->assign('statu_id',I('request.order_statu_id'));
        $this->assign('filter', $filter);
        //筛选条件
        if (I('request.order_statu_id')) {
            $condition['order_statu_id'] = I('request.order_statu_id');
        }
        if (I('request.order_sn')) {
            $condition['order_sn'] = I('request.order_sn');
        }
        //分页条件
        $limit = 10;
        $total = $model->where($condition)->count();
        $page = new Page($total, $limit);
        $rows = $model
            ->where($condition)
            ->order($order)
            ->limit($page->firstRow . ',' . $limit)->select();

        //实例化收货地址模型
        $receptM = M('Recept');
        $user = M('User');
        $order = [];
        foreach ($rows as $row) {
            $userId = $row['user_id'];
            $tel = $user->field('tel')->find($userId);
            $row['user_id'] = $tel['tel'];
            $recepts = unserialize($row['recept_info'])[0];
            $row['recept_id'] = $recepts;
            $goodinfo = $row['goods_info'];
            $row['goods_info'] = unserialize($goodinfo);
            $totalNum = 0;
            $totalPrice = 0;
            foreach ($row['goods_info'] as $v) {
                $totalNum += $v['buy_quantity'];
                $totalPrice += $v['buy_quantity'] * $v['shop_price'];
            }
            $row['totalPrice'] = $totalPrice;
            $order[] = $row;
        }
        $this->assign('rows', $order);
        //获取分页导航,可以通过page类的setConfig来配置相关信息
        $page->setConfig('prev', '<');//上一页
        $page->setConfig('next', '>');//下一页
        $page->setConfig('first', '|<');//首页
        $page->setConfig('last', '>|');//尾页
        $page->setConfig('header', '显示开始 %PAGE_START% 到 %PAGE_END% 条记录(总 %TOTAL_PAGE% 页)');
        $page->setConfig('theme', '<div class="col-sm-6 text-left"><ul class="pagination">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%</ul></div> <div class="col-sm-6 text-right">%HEADER%</div>');
        $page_bar = $page->show();
        $this->assign('page_bar', $page_bar);
        if (I('request.order_statu_id') == 2) {
            $this->display('Order/unsend');
        } else{
            $this->display();
        }
    }
    
    public function multiAction(){
        $this->checklogin();
        $operate = 'update';
        $selected = I('post.selected',[]);

        //dump($selected);die;
        if(empty($selected)){
            $operate = '';
        }
        switch ($operate){
            case 'update':
               M('Order')->where(['order_id'=>['in', $selected]])->save(['order_statu_id'=>3]);;
                break;
        }
        redirect(U('list',['order_statu_id'=>3]));
    }
}

