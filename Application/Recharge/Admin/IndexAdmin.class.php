<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
namespace Recharge\Admin;

use Admin\Controller\AdminController;
use Common\Util\Think\Page;

/**
 * 默认控制器
 * @author jry <598821125@qq.com>
 */
class IndexAdmin extends AdminController
{
    /**
     * 默认方法
     * @author jry <598821125@qq.com>
     */
    public function index()
    {
        // 获取所有记录
        $map['status'] = array('egt', '0'); // 禁用和正常状态
        $p = !empty($_GET["p"]) ? $_GET['p'] : 1;
        $user_object = D('Recharge');
        $data_list = $user_object
            ->page($p, C('ADMIN_PAGE_ROWS'))
            ->where($map)
            ->order('id desc')
            ->select();
        $page = new Page(
            $user_object->where($map)->count(),
            C('ADMIN_PAGE_ROWS')
        );

        // 使用Builder快速建立列表页面。
        $builder = new \Common\Builder\ListBuilder();
        $builder->setMetaTitle('充值纪录')// 设置页面标题
        ->addTableColumn('id', 'ID')
            ->addTableColumn('uid', '用户ID')
            ->addTableColumn('out_trade_no', '订单号')
            ->addTableColumn('money', '充值金额')
            ->addTableColumn('pay_type', '付款方式')
            ->addTableColumn('is_pay', '支付结果')
            ->addTableColumn('create_time', '注册时间', 'time')
            ->addTableColumn('status', '状态', 'status')
            ->setTableDataList($data_list)// 数据列表
            ->setTableDataPage($page->show())// 数据列表分页
            ->display();
    }
}