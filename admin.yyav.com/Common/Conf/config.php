<?php
return array(
	//'配置项'=>'配置值'
	'LOAD_EXT_CONFIG' => 'db,redis',
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',
	'URL_CASE_INSENSITIVE' =>true, //路由不区分大小写
	
	'DIY_AWS_WEB' => 'http://webmediacenter.s3.amazonaws.com/',

    //1220944184@qq.com 12-21
    //配置空模块
    'MODULE_ALLOW_LIST' => array('Backend','Home','Task'),
    'DEFAULT_MODULE' => 'Backend',
);