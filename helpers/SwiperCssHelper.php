<?php
namespace romkaChev\yii2\swiper\helpers;


use yii\helpers\ArrayHelper;

/**
 * Class SwiperCssHelper
 *
 * @package romkaChev\yii2\swiper\helpers
 */
class SwiperCssHelper
{

    /**
     * This function will get [[background]] property
     * and place it AFTER content of [[style]] property
     *
     * @param string $background
     * @param string $style
     *
     * @return string
     */
    public static function mergeStyleAndBackground( $background, $style )
    {
        $style = trim( $style, '; ' ) . "; background-image:url({$background});";
        $style = trim( $style, '; ' );

        return $style;
    }

    /**
     * This function will parse [[background-image]] or [[background]]
     * property from [[$style]]
     *
     * @param string $style
     *
     * @return string|null
     */
    public static function getBackgroundUrl( $style )
    {
        $patten = '/background(-image)?\s*:\s*url\s*\((?<source>[^\)]*)/';
        preg_match( $patten, $style, $backgroundImage );

        return trim( ArrayHelper::getValue( $backgroundImage, 'source', null ) );
    }

}