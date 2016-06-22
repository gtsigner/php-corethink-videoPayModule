<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
namespace Video\Admin;

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
        // 获取列表
        $map["status"] = array("egt", "0");  // 禁用和正常状态
        $p = !empty($_GET["p"]) ? $_GET["p"] : 1;
        $model_object = D("Index");
        $data_list = $model_object
            ->page($p, C("ADMIN_PAGE_ROWS"))
            ->where($map)
            ->order("sort asc,id asc")
            ->select();
        $page = new Page(
            $model_object->where($map)->count(),
            C("ADMIN_PAGE_ROWS")
        );

        // 使用Builder快速建立列表页面。
        $builder = new \Common\Builder\ListBuilder();
        $builder->setMetaTitle("列表")// 设置页面标题
        ->addTopButton("addnew")// 添加新增按钮
        ->addTopButton("resume")// 添加启用按钮
        ->addTopButton("forbid")// 添加禁用按钮
        ->setSearch("请输入ID/标题", U("index"))
            ->addTableColumn("id", "ID")
            ->addTableColumn("title", "标题")
            ->addTableColumn("video_name", "视频名称")
            ->addTableColumn("cat_id", "分类id")
            ->addTableColumn('you_day', '有效天数')
            ->addTableColumn("create_time", "创建时间", "time")
            ->addTableColumn("free_time", "免费时长")
            ->addTableColumn("pay_money", "支付金额")
            ->addTableColumn("title", "标题")
            ->addTableColumn("sort", "排序")
            ->addTableColumn("status", "状态", "status")
            ->addTableColumn("right_button", "操作", "btn")
            ->setTableDataList($data_list)// 数据列表
            ->setTableDataPage($page->show())// 数据列表分页
            ->addRightButton("edit")// 添加编辑按钮
            ->addRightButton("forbid")// 添加禁用/启用按钮
            ->addRightButton("delete")// 添加删除按钮
            ->display();
    }

    /**
     * 新增
     * @author jry <598821125@qq.com>
     */
    public function add()
    {
        if (IS_POST) {
            $model_object = D("Index");
            $data = $model_object->create(format_data());
            if ($data) {
                $id = $model_object->add($data);
                if ($id) {
                    $this->success("新增成功", U("index"));
                } else {
                    $this->error("新增失败" . $model_object->getError());
                }
            } else {
                $this->error($model_object->getError());
            }
        } else {
            // 使用FormBuilder快速建立表单页面
            $builder = new \Common\Builder\FormBuilder();
            $builder->setMetaTitle("新增视频")// 设置页面标题
            ->setPostUrl(U("add"))// 设置表单提交地址
            ->addFormItem("title", "text", "标题", "标题")
                ->addFormItem('content', 'kindeditor', '内容', '内容')
                ->addFormItem("cat_id", "select", "分类", "请选择分类", getCatList())
                ->addFormItem('mark', 'text', '备注信息', '备注信息')
                ->addFormItem('logo', 'picture', '显示图片', '显示图片')
                ->addFormItem('pay_money', 'price', '支付金额', '支付金额')
                ->addFormItem('you_day', 'num', '有效天数', '有效天数')
                ->addFormItem('free_time', 'num', '免费时间', '免费观看时间，秒 S 为单位,-1未免费')
                ->addFormItem('video_path', 'text', '视频路径', '默认 /Uploads/Video/')
                ->addFormItem('video_name', 'text', '视频名称', '视频名称')
                ->addFormItem("sort", "num", "排序", "用于显示的顺序")
                ->display();
        }
    }

    /**
     * 编辑
     * @author jry <598821125@qq.com>
     */
    public function edit($id)
    {
        if (IS_POST) {
            $model_object = D("Index");
            $data = $model_object->create(format_data());
            $data['cat_id'] = intval(I('cat_id'));
            if ($data) {
                $id = $model_object->save($data);
                if ($id !== false) {
                    $this->success("更新成功", U("index"));
                } else {
                    $this->error("更新失败" . $model_object->getError());
                }
            } else {
                $this->error($model_object->getError());
            }
        } else {
            // 使用FormBuilder快速建立表单页面。
            $builder = new \Common\Builder\FormBuilder();
            $builder->setMetaTitle("编辑视频")// 设置页面标题
            ->setPostUrl(U("edit"))// 设置表单提交地址
            ->addFormItem("id", "hidden", "ID", "ID")
                ->addFormItem("title", "text", "标题", "标题")
                ->addFormItem("content", "kindeditor", "内容", "内容")
                ->addFormItem("cat_id", "select", "分类", "请选择分类", getCatList())
                ->addFormItem('mark', 'text', '备注信息', '备注信息')
                ->addFormItem('logo', 'picture', '显示图片', '显示图片')
                ->addFormItem('pay_money', 'price', '支付金额', '支付金额')
                ->addFormItem('you_day', 'num', '有效天数', '有效天数')
                ->addFormItem('free_time', 'num', '免费时间', '免费观看时间，秒 S 为单位,-1未免费')
                ->addFormItem('video_path', 'text', '视频路径', '视频路径')
                ->addFormItem('video_name', 'text', '视频名称', '视频名称')
                ->addFormItem('mark', 'text', '备注信息', '备注信息')
                ->addFormItem("sort", "num", "排序", "用于显示的顺序")
                ->setFormData(D("Index")->find($id))
                ->display();
        }
    }


    //支付日志
    public function paylogs()
    {
        $db_model = D('video_pay_logs');
        $list = $db_model->where()->select();
        $this->assign('list', $list);
        $this->display();
    }
}
