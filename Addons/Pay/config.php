<?php
// +----------------------------------------------------------------------
// | CoreThink [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.corethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com> <http://www.corethink.cn>
// +----------------------------------------------------------------------
return array(
    'status'=>array(
        'title'=>'支付总开关',
        'type'=>'radio',
        'options'=>array(
            '1'=>'开启',
            '0'=>'关闭',
        ),
        'value'=>'1',
    ),
    'allow_pay_type'=>array(
        'title'=>'启用的支付方式',
        'type'=>'checkbox',
        'options'=>array(
            'alipay'    => '支付宝',
            'unionpay'  => '银联支付',
            'tenpay'    => '财付通',
            'paypal'    => '贝宝paypal',
            'kuaiqian'  => '快钱支付',
            'yeepay'    => '易宝支付',
        ),
        'value'=>'',
    ),
    'group'=>array(
        'type'=>'group',
        'options'=>array(
            'alipay'=>array(
                'title'=>'支付宝',
                'options'=>array(
                    'alipay_email'=>array(
                        'title'=>'支付宝账户',
                        'type'=>'text',
                        'value'=>'25',
                        'tip'=>'一般为邮箱',
                    ),
                    'alipay_partner'=>array(
                        'title'=>'partner',
                        'type'=>'text',
                        'value'=>'',
                        'tip'=>'类似：2088911710861332',
                    ),
                    'alipay_key'=>array(
                        'title'=>'Key',
                        'type'=>'text',
                        'value'=>'',
                    ),
                ),
             ),
            'unionpay'=>array(
                'title'=>'银联支付',
                'options'=>array(
                    'unionpay_partner'=>array(
                        'title'=>'partner',
                        'type'=>'text',
                        'value'=>'',
                    ),
                    'unionpay_key'=>array(
                        'title'=>'Key',
                        'type'=>'text',
                        'value'=>'',
                    ),
                )
            ),
            'tenpay'=>array(
                'title'=>'财付通',
                'options'=>array(
                    'tenpay_partner'=>array(
                        'title'=>'partner',
                        'type'=>'text',
                        'value'=>'',
                    ),
                    'tenpay_key'=>array(
                        'title'=>'Key',
                        'type'=>'text',
                        'value'=>'',
                    ),
                )
            ),
            'paypal'=>array(
                'title'=>'贝宝paypal',
                'options'=>array(
                    'paypal_business'=>array(
                        'title'=>'paypal账户',
                        'type'=>'text',
                        'value'=>'',
                    ),
                )
            ),
            'kuaiqian'=>array(
                'title'=>'快钱支付',
                'options'=>array(
                    'kuaiqian_partner'=>array(
                        'title'=>'partner',
                        'type'=>'text',
                        'value'=>'',
                    ),
                    'kuaiqian_key'=>array(
                        'title'=>'Key',
                        'type'=>'text',
                        'value'=>'',
                    ),
                )
            ),
            'yeepay'=>array(
                'title'=>'易宝支付',
                'options'=>array(
                    'yeepay_partner'=>array(
                        'title'=>'partner',
                        'type'=>'text',
                    ),
                    'yeepay_key'=>array(
                        'title'=>'Key',
                        'type'=>'text',
                    ),
                )
            ),
        )
    )
);
