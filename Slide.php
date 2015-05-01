<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 01.05.2015
 * Time: 22:42
 */

namespace romkaChev\yii2\swiper;

use yii\base\Object;

class Slide extends Object
{
    public $content;

    public $options;

    /**
     * @param string|mixed[] $config
     */
    public function __construct( $config = [ ] )
    {
        if (is_string( $config )) {
            $config = [ 'content' => $config ];
        }

        if (is_array( $config["content"] )) {
            $config["content"] = implode( '', $config["content"] );
        }

        parent::__construct( $config );
    }

}