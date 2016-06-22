<?php


function times_to_date($times)
{
    return date('Y-m-d H:m:s', $times);
}

//生成当订单号
function create_order_no()
{
    $year_code = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
    return 'CT' . $year_code[intval(date('Y')) - 2010] . strtoupper(dechex(date('m'))) .
    date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('d', rand(0, 99));
}

function getCatList()
{
    $list = D('video_category')->select();
    $retarr = array();
    foreach ($list as $k => $v) {
        //$retarr[] = array('value' => $v['id'], 'title' => $v['title']);
        $retarr[$v['id']] = $v['title'];
    }
    return $retarr;
}