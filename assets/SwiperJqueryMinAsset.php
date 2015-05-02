<?php
namespace romkaChev\yii2\swiper\assets;


use yii\web\AssetBundle;

/**
 * Class SwiperJqueryMinAsset
 *
 * @package romkaChev\yii2\swiper\assets
 */
class SwiperJqueryMinAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/swiper/dist';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/swiper.jquery.min.js'
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