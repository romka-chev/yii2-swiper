<?php

define( 'YII_ENABLE_ERROR_HANDLER', true );
define( 'YII_DEBUG', true );

$_SERVER['SCRIPT_NAME']     = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

require_once( __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php' );
require_once( __DIR__ . '/../../vendor/autoload.php' );

//require_once(__DIR__ . '/../../assets/SwiperAsset.php');
//require_once(__DIR__ . '/../../assets/SwiperJqueryAsset.php');
//require_once(__DIR__ . '/../../assets/SwiperJqueryMinAsset.php');
//require_once(__DIR__ . '/../../assets/SwiperMinAsset.php');
//require_once(__DIR__ . '/../../Swiper.php');
//require_once(__DIR__ . '/../../Slide.php');

Yii::setAlias( '@yiiunit', __DIR__ );

require_once( __DIR__ . '/BaseTestCase.php' );