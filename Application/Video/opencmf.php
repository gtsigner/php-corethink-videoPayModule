<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
// 模块信息配置
return array(
    // 模块信息
    'info' => array(
        'name' => 'Video',
        'title' => '视频',
        'icon' => 'fa fa fa-money',
        'icon_color' => '#F9B440',
        'description' => '视频模块',
        'developer' => 'CodeWitty 老司机',
        'website' => 'http://www.opencmf.cn',
        'version' => '1.2.0',
        'dependences' => array(
            'Admin' => '1.1.0',
        )
    ),

    // 用户中心导航
    'user_nav' => array(
        'main' => array(
            '0' => array(
                'title' => '视频订单',
                'icon' => 'fa fa-tachometer',
                'url' => 'Video/Index/orders',
            ),
        ),
    ),

    // 模块配置
    'config' => array(
        'status' => array(
            'title' => '是否开启',
            'type' => 'radio',
            'options' => array(
                '1' => '开启',
                '0' => '关闭',
            ),
            'value' => '1',
        ),
        'taglib' => array(
            'title' => '加载标签库',
            'type' => 'checkbox',
            'options' => array(
                'Video' => 'Video',
            ),
            'value' => array(
                '0' => 'Video',
            ),
        ),
        'behavior' => array(
            'title' => '行为扩展',
            'type' => 'checkbox',
            'options' => array(
                'Video' => 'Video',
            ),
        ),
    ),

    // 后台菜单及权限节点配置
    'admin_menu' => array(
        '1' => array(
            'pid' => '0',
            'title' => '视频',
            'icon' => 'fa fa fa-money',
        ),
        '2' => array(
            'pid' => '1',
            'title' => '视频管理',
            'icon' => 'fa fa-folder-open-o',
        ),
        '3' => array(
            'pid' => '2',
            'title' => '视频设置',
            'icon' => 'fa fa-wrench',
            'url' => 'Video/Index/module_config',
        ),
        '4' => array(
            'pid' => '2',
            'title' => '视频列表',
            'icon' => 'fa fa-list',
            'url' => 'Video/Index/index',
        ),
        '5' => array(
            'pid' => '4',
            'title' => '新增',
            'url' => 'Video/Index/add',
        ),
        '6' => array(
            'pid' => '5',
            'title' => '编辑',
            'url' => 'Video/Index/edit',
        ),
        '7' => array(
            'pid' => '5',
            'title' => '设置状态',
            'url' => 'Video/Index/setStatus',
        ),

        '8' => array(
            'pid' => '1',
            'title' => '分类管理',
        ),
        '9' => array(
            'pid' => '8',
            'title' => '新增分类',
            'icon' => 'fa fa-wrench',
            'url' => 'video/category/add',
        ),
        '10' => array(
            'pid' => '8',
            'title' => '分类列表',
            'icon' => 'fa fa-wrench',
            'url' => 'video/category/index',
        ),
        '11' => array(
            'pid' => '2',
            'title' => '支付列表',
            'icon' => 'fa fa-wrench',
            'url' => 'video/index/paylogs',
        ),

    )
);
