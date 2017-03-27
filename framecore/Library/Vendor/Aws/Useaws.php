<?php
include 'aws-autoloader.php';
use Aws\S3\S3Client;
class Useaws {

	//上传图片
	public static function upload($file,$key,$type){
		switch ($type) {
			case 'pic':
				$contentType = 'image/pjpeg';
				break;
			case 'audio':
				$contentType = 'audio/mpeg';
				break;
			default:
				return 'type参数可传pic或audio';
				break;
		}
		if(!file_exists($file)){
			return '要上传的图片文件不存在';
			exit();
		}
		$client = S3Client::factory(  array(
            'credentials' => array(
                'key'    => 'AKIAIHC5KYXDFMBF4B5Q',
                'secret' => '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',
            )
        ));

        $bucket ="webmediacenter";
        //"image/pjpeg", "image/gif", "image/bmp", "image/x-png"
        $res    = $client->putObject(
            array(
                'Bucket'       => $bucket,
                'Key'          => $key,
                'SourceFile'   => $file,
                'ACL'    => 'public-read',
                'ContentType' => $contentType
            )
        );
        return true;
	}
}