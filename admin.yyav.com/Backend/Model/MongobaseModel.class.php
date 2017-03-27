<?php
namespace Backend\Model;
use Think\Model\MongoModel;

class MongobaseModel extends MongoModel
{
	protected $connection = 'MONGO_DB';//连接mongo配置
}