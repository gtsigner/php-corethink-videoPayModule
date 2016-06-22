# Host: 127.0.0.1  (Version: 5.5.40)
# Date: 2016-02-21 01:20:01
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "oc_video_category"
#

DROP TABLE IF EXISTS `oc_video_category`;
CREATE TABLE `oc_video_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父分类ID',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '分类名称',
  `icon` varchar(32) NOT NULL DEFAULT '' COMMENT '缩略图',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='栏目分类表';

#
# Data for table "oc_video_category"
#

/*!40000 ALTER TABLE `oc_video_category` DISABLE KEYS */;
INSERT INTO `oc_video_category` VALUES (1,0,'小黄片','fa fa-send-o',1431926468,1446449005,0,1),(2,0,'教育片','fa-search',1446449071,1446449394,0,1),(3,0,'日本片','fa-heart',1446449078,1446449400,0,1),(8,0,'demo1','',1455975502,1455975502,0,1);
/*!40000 ALTER TABLE `oc_video_category` ENABLE KEYS */;


# Host: 127.0.0.1  (Version: 5.5.40)
# Date: 2016-02-21 01:19:55
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "oc_video_pay_logs"
#

DROP TABLE IF EXISTS `oc_video_pay_logs`;
CREATE TABLE `oc_video_pay_logs` (
  `order_no` varchar(50) NOT NULL DEFAULT '' COMMENT '订单号',
  `uid` int(10) unsigned DEFAULT '0' COMMENT '会员id',
  `video_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '视频id',
  `pay_money` decimal(10,2) unsigned DEFAULT NULL COMMENT '支付金额',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态',
  `end_time` int(10) unsigned DEFAULT '0' COMMENT '有效期',
  PRIMARY KEY (`order_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='默认数据表';

#
# Data for table "oc_video_pay_logs"
#

/*!40000 ALTER TABLE `oc_video_pay_logs` DISABLE KEYS */;
INSERT INTO `oc_video_pay_logs` VALUES ('CTG2218874841017d',2,1,100.00,1455988748,1455988748,0,1,1458580769);
/*!40000 ALTER TABLE `oc_video_pay_logs` ENABLE KEYS */;



# Host: 127.0.0.1  (Version: 5.5.40)
# Date: 2016-02-21 01:19:48
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "oc_video_index"
#

DROP TABLE IF EXISTS `oc_video_index`;
CREATE TABLE `oc_video_index` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(127) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `cat_id` int(11) DEFAULT '0',
  `pay_money` decimal(10,2) unsigned DEFAULT NULL COMMENT '支付金额',
  `free_time` int(10) DEFAULT '18' COMMENT '免费时长,秒',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态',
  `mark` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `video_path` varchar(255) DEFAULT NULL COMMENT '视频路径',
  `video_name` varchar(255) DEFAULT NULL COMMENT '视频名称',
  `logo` varchar(255) DEFAULT NULL,
  `you_day` int(11) unsigned DEFAULT '30' COMMENT '有效天数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='默认数据表';

#
# Data for table "oc_video_index"
#

/*!40000 ALTER TABLE `oc_video_index` DISABLE KEYS */;
INSERT INTO `oc_video_index` VALUES (1,'七天大圣虽无恐','                                                                                                                                                                七天大圣虽无恐                                                                                                                        ',3,100.00,3,0,1455978758,1,1,'被','./Uploads/Video/','level5.mp4','',30),(2,'日本小片','日本小片',2,123.00,10,1455844695,1455884204,1,1,'1231','./Uploads/Video/','1.webm','',30),(6,'齐天大圣','                                                                                                123                                                                        ',2,11.00,12,1455977165,1455987623,0,1,'123','/Uploads/Video/','1.webm','',30),(7,'123','                                123                        ',2,123.00,1312,1455978198,1455978642,12,1,'123','123','123','',30),(8,'123','                2            ',8,123.00,123,1455978235,1455978730,0,1,'123','123','123','',30);
/*!40000 ALTER TABLE `oc_video_index` ENABLE KEYS */;
