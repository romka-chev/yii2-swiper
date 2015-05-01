<?php
namespace romkaChev\yii2\swiper;

use yii\web\AssetBundle;

/**
 * Class SwiperAsset
 *
 * @package romkaChev\yii2\swiper
 */
class SwiperAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/swiper';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/swiper.jquery.js',
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/swiper.css',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}