<?php
/**
 * Created by PhpStorm.
 * User: ZhaoJun
 * Date: 2016/2/20
 * Time: 21:18
 */

namespace Video\Admin;


use Admin\Controller\AdminController;

class CategoryAdmin extends AdminController
{
    public function index()
    {
        $list = D('video_category')->select();
        $this->assign('list', $list);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $single = D('video_category')->create();
            $single['create_time'] = time();
            $single['update_time'] = time();
            $ret = D('video_category')->add($single);
            if ($ret) {
                $this->success('添加成功!');
            } else {
                $this->error('添加失败!');
            }
        } else {
            $list = D('video_category')->select();
            $this->assign('cat_list', $list);
            $this->display();
        }


    }

    public function del()
    {

    }


}