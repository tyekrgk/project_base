<?php

return array(
	'URL_MODEL' => 2,
    'CHECK_ACTION' => true,
    'LOAD_EXT_CONFIG' => 'mongo',

    //语言配置
    'language' => array(
        'en' => '英语',
        'ar' => '阿拉伯语',
        'ru' => '俄语',
        'cn' => '中文',
        'fr' => '法语',
        'jp' => '日语',
        'pt' => '葡萄牙语',
        'es' => '西班牙语',
    ),

    //Android_Top国家配置
    'TOP_COUNTRY' => array(
        'chn' => '中国',
        'usa' => '美国',
        'uk' => '英国',
        'jpn' => '日本',
        'rus' => '俄国',
        'fra' => '法国',
        'can' => '加拿大',
        'mex' => '墨西哥',
        'bra' => '巴西',
        'ksa' => '沙特',
    ),

    //图标分组配置
    'icon_group' => array(
        1001 => 'banner标识',
        1002 => '应用标识',
        1003 => '专题标识',
    ),

    //广告类型
    'ad_type' => array(
        1 => '图片',
        2 => '文字',
    ),

    //主站专题位置
    'topic_position' => array(
        1 => '主站顶部',
        2 => '主站专题',
    ),

    //主站大分类
    'topic_category' => array(
        1 => 'Android',
        2 => 'Apple',
        3 => 'Ring',
        4 => 'Wallpaper',
    ),

    //铃声频道歌手国家
    'ring_singer_country' => array(
        1 => 'America',
        2 => 'Brazil',
        3 => 'British',
        4 => 'Canada',
        5 => 'France',
        6 => 'India',
        7 => 'Middle East',
        8 => 'Russia',
        9 => 'Others',
    ),

    //铃声频道专题位置
    'ring_topic_position' => array(
        1 => '首页专题页',
        2 => '分类页'
    ),

   'IOS_TOPIC_LOCATION' => array(
        1 => '首页banner',
        2 => '首页推荐',
        3 => '专题列表',
        4 => '装机必备',
    ),

   //主站静态数据存放路径
   'WWW_STATIC_DATA_DIR' => array(
        'androidtoptopic' => '/www.vshare.comstatic/data/android/top_topic.json',
        'androidtopic' => '/www.vshare.comstatic/data/android/topic.json',
        'androidad' => '/www.vshare.comstatic/data/android/ad.json',
        'iostoptopic' => '/www.vshare.comstatic/data/ios/top_topic.json',
        'iostopic' => '/www.vshare.comstatic/data/ios/topic.json',
        'iosad' => '/www.vshare.comstatic/data/ios/ad.json',
        'ringtonetopic' => '/www.vshare.comstatic/data/ring/topic.json',
        'ringtonetop' => '/www.vshare.comstatic/data/ring/top.json',
        'wallpapertop' => '/www.vshare.comstatic/data/wallpaper/top.json',
        'newgamestopic' => '/www.vshare.comstatic/data/games/newgamestopic.json',
    ),

   'NEW_WWW_STATIC_DATA_DIR' => array(
        'androidtoptopic' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/android/top_topic.json',
        'androidtopic' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/android/topic.json',
        'androidad' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/android/ad.json',
        'iostoptopic' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/ios/top_topic.json',
        'iostopic' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/ios/topic.json',
        'iosad' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/ios/ad.json',
        'ringtonetopic' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/ring/topic.json',
        'ringtonetop' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/ring/top.json',
        'wallpapertop' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/wallpaper/top.json',
        'newgamestopic' => '/data0/www/vsweb/otherapps/wwwmobilevshare/resource/wwwmobilevshare/data/games/newgamestopic.json',
    ),

    //壁纸频道分辨率
    'WALLPAPER_MOBILE_RATE' => array(
        '640x960'    => '640x960',
        '640x1136'   => '640x1136',
        '1200x1600'  => '1200x1600',
        '900x1600'   => '900x1600',
        '960x1600'   => '960x1600',
    ),
);
