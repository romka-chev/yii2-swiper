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
    public $background;
    public $hash;
    public $options = [ ];

    /**
     * @param string|mixed[] $config
     */
    public function __construct( $config = [ ] )
    {
        if (is_string( $config )) {
            $config = [ 'content' => $config ];
        }

        if (isset( $config['content'] ) && is_array( $config["content"] )) {
            $config["content"] = implode( '', $config["content"] );
        }

        ! isset( $config['options'] ) && $config['options'] = [ ];
        ! isset( $config['options']['style'] ) && $config['options']['style'] = '';


        if (isset( $config['background'] ) && is_string( $config['background'] )) {
            $config['options']['style'] = implode( ';', array_merge( [ $config['options']['style'] ], [ "background-image:url({$config['background']})" ] ) );
            $config['options']['style'] = str_replace( ';;', ';', $config['options']['style'] );
            $config['options']['style'] = trim( $config['options']['style'], ';' );
        }
        if ( ! $config['options']['style']) {
            unset( $config['options']['style'] );
        }

        if (isset( $config["hash"] ) && ! empty( $config["hash"] )) {
            $config["options"]["data"]["hash"] = $config["hash"];
        }

        parent::__construct( $config );
    }

}