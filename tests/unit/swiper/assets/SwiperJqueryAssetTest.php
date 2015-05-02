<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 02.05.2015
 * Time: 23:09
 */

namespace romkaChev\yii2\swiper\tests\unit\swiper\assets;


use romkaChev\yii2\swiper\assets\SwiperJqueryAsset;
use romkaChev\yii2\swiper\tests\unit\BaseTestCase;

class SwiperJqueryAssetBaseTest extends BaseTestCase
{

    public function testMain()
    {
        SwiperJqueryAsset::register( \Yii::$app->getView() );
    }

}