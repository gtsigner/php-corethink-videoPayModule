<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
namespace Recharge\Controller;

use Home\Controller\HomeController;
use Common\Util\Think\Page;
use Addons\Pay\ThinkPay\Pay;

/**
 * 默认控制器
 * @author jry <598821125@qq.com>
 */
class IndexController extends HomeController
{
    /**
     * 充值首页
     * @author jry <598821125@qq.com>
     */
    public function index()
    {
        $addon_pay_config = json_decode(D('Admin/Addon')->getFieldByName('Pay', 'config'), true);
        if (IS_POST) {
            $this->is_login();
            // 订单数据
            $pay_type = I('post.pay_type');
            $pay_config['email'] = $addon_pay_config[$pay_type . '_email'];
            $pay_config['partner'] = $addon_pay_config[$pay_type . '_partner'];
            $pay_config['key'] = $addon_pay_config[$pay_type . '_key'];
            $pay_config['business'] = $addon_pay_config[$pay_type . '_business'];
            $pay_config['notify_url'] = U("notify", array('apitype' => $pay_type, 'method' => 'notify'), false, true);
            $pay_config['return_url'] = U("notify", array('apitype' => $pay_type, 'method' => 'return'), false, true);

            // 订单数据
            $pay = new Pay($pay_type, $pay_config);
            $pay_data['out_trade_no'] = $pay->createOrderNo();
            $pay_data['title'] = C('WEB_SITE_TITLE') . "余额充值";
            $pay_data['body'] = C('WEB_SITE_TITLE') . "余额充值";
            $pay_data['money'] = sprintf("%0.2f", I('post.money'));
            $pay_data['pay_type'] = $pay_type;

            session('pay_config', $pay_config);
            session('pay_data', $pay_data);

            // 支付页面
            echo $pay->buildRequestForm($pay_data);
        } else {
            Cookie('__forward__', $_SERVER['REQUEST_URI']);
            $this->assign('allow_pay_type', $addon_pay_config['allow_pay_type']);
            $this->assign('meta_title', '充值');
            $this->assign('userinfo', D('User/User')->detail(is_login()));//用户信息
            $this->display();
        }
    }

    /**
     * 支付结果返回
     */
    public function notify()
    {
        $this->is_login();
        $apitype = I('get.apitype');
        $pay = new Pay($apitype, session('pay_config'));
        if (IS_POST && !empty($_POST)) {
            $notify = $_POST;
        } elseif (IS_GET && !empty($_GET)) {
            $notify = $_GET;
            unset($notify['method']);
            unset($notify['apitype']);
        } else {
            exit('Access Denied');
        }

        // 取得数据
        $pay_data = session('pay_data');
        session('pay_data', null);    // 重要不然会造成订单号重复

        // 支付成功将订单记录
        $recharge_object = D('Recharge');
        $data = $recharge_object->create($pay_data);
        $add_result = D('Recharge')->add($data);
        if ($add_result) {
            // 验证
            if ($pay->verifyNotify($notify)) {
                //获取订单信息
                $pay_info = $pay->getInfo();
                if ($pay_info['status'] === true) {
                    // 设置支付成功标记
                    $con['out_trade_no'] = $pay_info['out_trade_no'];
                    $pay_success['money'] = $pay_info['money'];
                    $pay_success['is_pay'] = 1;
                    $is_pay = D('Recharge')->where($con)->setField($pay_success);
                    session("pay_verify", true);

                    // 执行回调函数完成比如充值后的数据操作
                    $callback_status = $this->rechargeCallback($data);
                    if ($callback_status === true) {
                        // 设置回调成功标记
                        $con['out_trade_no'] = $pay_info['out_trade_no'];
                        $callback_success['is_callback'] = 1;
                        $is_callback = D('Recharge')->where($con)->setField($callback_success);
                        if ($is_callback) {
                            if (I('get.method') == "return") {
                                $this->redirect("User/Center/index");
                            } else {
                                $pay->notifySuccess();
                            }
                        } else {
                            $this->error("回调标记设置错误！");
                        }
                    }
                } else {
                    E("支付失败！ !");
                }
            } else {
                E("Access Denied !");
            }
        } else {
            E('严重错误，请联系客服！' . $recharge_object->getError());
        }
    }

    /**
     * 余额充值成功回调接口
     * @param type $money
     * @param type $param
     */
    private function rechargeCallback($pay_data)
    {
        $this->is_login();
        if (session("pay_verify") === true) {
            session("pay_verify", null);
            if (!$pay_data['uid'] || !$pay_data['money']) {
                E('参数错误');
            }
            $uid = $pay_data['uid'];
            $money = $pay_data['money'];
            $money_log_object = D('User/MoneyLog');
            $result = $money_log_object->changeScore(1, $uid, $money, '余额充值'); // 充值
            if ($result === true) {
                $msg_data['title'] = '充值成功，' . $money . '元已到账！'; // 消息标题
                $msg_data['content'] = '充值成功，' . $money . '元已到账！'; // 消息内容
                $msg_data['to_uid'] = $uid; //消息收信人ID
                D('User/Message')->sendMessage($msg_data);
                return true;
            } else {
                E($money_log_object->getError());
                return false;
            }
        } else {
            E("Access Denied");
        }
    }
}
