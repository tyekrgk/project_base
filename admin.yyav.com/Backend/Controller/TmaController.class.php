<?php
namespace Backend\Controller;
use Think\Controller;

class TmaController extends Controller
{
        public function add_ma()
	{
                ini_set('max_execution_time', 0);
                $gamesModel = D('Games');
                $count = $gamesModel->count();
                $num = ceil($count/50);
                for($i=1;$i<=$num;$i++){
                        $list = $gamesModel->page($i,50)->select();
                        if($list){
                                foreach($list as $k=>$v){
                                        $key = $this->_make_ma($v['name_url']);
                                        if($key){
                                                //更新到数据库
                                                $gamesModel->where(array('id'=>$v['id']))->save(array('qr_code_hash'=>$key));
                                        }
                                }
                        }
                }
                $this->_make_ma('bunny-pop');
	}

	private function _make_ma($nameUrl)
	{
		vendor("phpqrcode.phpqrcode");
                $data = "http://www.mobopanda.com/url?type=gamedetail&name_url={$nameUrl}";
                // 纠错级别：L、M、Q、H
                $level = 'L';
                // 点的大小：1到10,用于手机端4就可以了
                $size = 10;
                // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
                $path = "./";
                // 生成的文件名
                $fileName = $path.$nameUrl.'.png';
                \QRcode::png($data, $fileName, $level, $size);

                $key = md5($fileName);
                //上传到亚马逊
                $flag = upload_aws($fileName,$key,'pic');
                @unlink($fileName);
                if($flag){
                        return $key;
                }else{
                        return false;
                }
	}
}