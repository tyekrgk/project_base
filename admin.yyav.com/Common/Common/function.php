<?php
	
	//检查验证正码
	function check_verify($code, $id = '')
	{    
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}

	//上传文件到亚马逊
	function upload_aws($file,$key,$type)
	{
		vendor('Aws.Useaws');
		return \Useaws::upload($file,$key,$type);
	}

	//curl post
	function curl_post($url,$fields)
	{
		//open connection  
		$ch = curl_init() ;
		//set the url, number of POST vars, POST data  
		curl_setopt($ch, CURLOPT_URL,$url) ;  
		curl_setopt($ch, CURLOPT_POST,count($fields)) ; // 启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。  
		curl_setopt($ch, CURLOPT_POSTFIELDS,$fields); // 在HTTP中的“POST”操作。如果要传送一个文件，需要一个@开头的文件名  
		
		ob_start();
		curl_exec($ch);
		$result = ob_get_contents();
		ob_end_clean();
		//close connection
		curl_close($ch) ;
		return $result;
	}

	//curl get
	function curl_get($url)
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
		return $file_contents;
	}


	//生成SEO URL
	function make_seourl($name)
	{
		return strtolower(preg_replace("/[^a-zA-Z0-9-]+/",'-',$name));
	}


    //**模拟登陆
    function login_post($url,$cookie,$post)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,0);          //是否显示头部信息
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);  //是否自动显示返回信息
        curl_setopt($ch,CURLOPT_COOKIEJAR,$cookie); //设置cookie保存到指定文件中
        curl_setopt($ch,CURLOPT_POST,1);            //post 方式提交
        curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($post));  //提交的参数
        curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie);
        curl_exec($ch);
        curl_close($ch);
    }

    /**curl抓取https的网页
     * @param $url
     * @return mixed
     */
    function curl_https($url)
    {
        $ch = curl_init();
        $timeout = 5;
        $gzip = 'gzip';

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        curl_setopt($ch,CURLOPT_ENCODING,$gzip);
//        curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,1);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    //生成二维码
    function make_ma($nameUrl){
        vendor("phpqrcode.phpqrcode");
        $data = "http://www.mobopanda.com/url?type=gamedetail&name_url={$nameUrl}";
        // 纠错级别：L、M、Q、H
        $level = 'L';
        // 点的大小：1到10,用于手机端4就可以了
        $size = 10;
        // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
        $path = "../tempfile/";
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