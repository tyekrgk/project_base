<?php
namespace Backend\Model;
use Backend\Model\MongobaseModel;

class AndroidAppModel extends MongobaseModel
{
	protected $trueTableName = 'app';

	//根据ID查询某个应用
	public function getAppByID($ID)
	{
		$app = $this->where(array('_id'=>$ID,'web_is_deleted' => false))->find();
		return $app;
	}

    /**按条件搜索
     * @param string $option
     * @param array $where
     * @return mixed
     */
    public function getAndroidAppByCondition($option = 'select',$where = array())
    {
        switch($option){
            case 'find':
                return $this->where($where)->find();
            case 'select':
                return $this->where($where)->select();
        }
    }

    /**分页数据
     * @param $page
     * @param $pageSize
     * @param array $where
     * @param null $order
     * @return array
     */
    public function getPaginationData($page,$pageSize,$where = array(),$order = 'web_download_count desc')
    {

        $data = $this->where($where)->order($order)->page($page,$pageSize)->select();
        $count = $this->where($where)->count();

        $pageData = array(
            'count' => $count,
            'data' => $data,
        );

        return $pageData;
    }
}