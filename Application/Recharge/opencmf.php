<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
//模块信息配置
return array(
    //模块信息
    'info' => array(
        'name' => 'Recharge',
        'title' => '充值',
        'icon' => 'fa fa-money',
        'icon_color' => '#8ECD5D',
        'description' => '用户充值模块',
        'developer' => '南京科斯克网络科技有限公司',
        'website' => 'http://www.opencmf.cn',
        'version' => '1.2.0',
        'dependences' => array(
            'Admin' => '1.1.0',
            'User' => '1.1.0',
        )
    ),

    //后台菜单及权限节点配置
    'admin_menu' => array(
        '1' => array(
            'id' => '1',
            'pid' => '0',
            'title' => '充值',
            'icon' => 'fa fa-money',
            'top' => 'User',
        ),
        '2' => array(
            'pid' => '1',
            'title' => '充值管理',
            'icon' => 'fa fa-folder-open-o',
        ),
        '3' => array(
            'pid' => '2',
            'title' => '充值纪录',
            'icon' => 'fa fa-money',
            'url' => 'Recharge/Index/index',
        ),
    )
);
