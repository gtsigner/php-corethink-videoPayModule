<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------
namespace Video\TagLib;

use Think\Template\TagLib;

/**
 * 标签库
 * @author jry <598821125@qq.com>
 */
class Video extends TagLib
{
    /**
     * 定义标签列表
     * @author jry <598821125@qq.com>
     */
    protected $tags = array(
        'list' => array('attr' => 'name', 'close' => 1),  //文档列表
    );

    /**
     * 文档列表
     * @author jry <598821125@qq.com>
     */
    public function _list($tag, $content)
    {
        $name = $tag["name"];
        $parse = '<?php ';
        $parse .= '$__Video_LIST__ = D("Video/Index")->select();';
        $parse .= ' ?>';
        $parse .= '<volist name="__Video_LIST__" id="' . $name . '">';
        $parse .= $content;
        $parse .= '</volist>';
        return $parse;
    }
}
