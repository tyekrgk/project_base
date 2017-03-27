<?php
namespace Backend\Model;
use Think\Model;

class SodoCrawlTaskModel extends Model{

    protected $trueTableName = 'sodo_crawl_task';
    protected $_validate = array(
        array('addr','require','不能为空'),
        array('type','require','不能为空'),
        array('lang','require','不能为空'),
        array('hundleId','require','不能为空'),
        array('platform','require','不能为空'),
        array('result','require','不能为空'),
        array('time','require','不能为空'),
    );




 }