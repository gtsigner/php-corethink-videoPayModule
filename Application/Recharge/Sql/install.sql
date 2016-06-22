CREATE TABLE `oc_recharge` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `out_trade_no` varchar(32) NOT NULL DEFAULT '' COMMENT '订单号',
  `uid` int(11) unsigned NOT NULL COMMENT '用户ID',
  `money` decimal(10,2) NOT NULL COMMENT '支付金额',
  `pay_type` varchar(11) NOT NULL DEFAULT '0' COMMENT '付款方式',
  `is_pay` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否支付成功',
  `is_callback` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否回调成功',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用充值记录表';
