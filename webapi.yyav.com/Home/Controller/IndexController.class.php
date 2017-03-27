<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    
    

    public $elasInit = array(
		'index' => 'android',
		'type' => 'apps',
	);

	public function _initialize()
    {
        vendor('Elasticsearch.autoload');
        $params['hosts'] = array(
            '127.0.0.1:9200'
        );
        $this->client = new \Elasticsearch\Client($params);
    }


    public function index()
    {
        echo 'webapi is running...';
    }

    public function test_insert()
    {
    	$params = $this->elasInit;
    	$params['id'] = '123456';
    	$params['body'] = array(
    		'des' => 'hahha',
    		'aaa' => 'bbbb',
		);

		$res = $this->client->index($params);
		var_dump($res);
    }

    public function test_get()
    {
    	error_reporting(0);
    	ini_set('display_errors','Of');

    	$params = $this->elasInit;
    	$params['id'] = '1234567';

    	try{
    		$res = $this->client->get($params);
    		if($res['found']){
	    		var_dump($res);
	    	}else{
	    		echo 'wu';
	    	}
    	}catch(Missing404Exception $e){
    		echo $e->getMessage();
    	}
    	

    	
    }

    public function test_insert1()
    {
    	$params = $this->elasInit;
    	$params['id'] = '100004';
    	$params['body'] = array(
    		'heelo' => 'yyyy',
            'name' => 'wxd',
		);

		$res = $this->client->index($params);
		var_dump($res);
    }

    public function test_count()
    {
    	$params = $this->elasInit;
    	$res = $this->client->count($params);
    	var_dump($res);
    }

    public function test111()
    {
        $params = $this->elasInit;
        $params['body']['query']['match']['heelo'] = 'yyyy';
        $params['body']['query']['match']['name'] = 'wxd';

        $res = $this->client->search($params);
        var_dump($res['hits']['hits']);
    }
}