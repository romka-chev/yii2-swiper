<?php
namespace romkaChev\yii2\swiper;

use yii\base\Object;

/**
 * Slide is representation of each slide for Swiper widget.
 * If you want, you can use it directly.
 *
 * @package romkaChev\yii2\swiper
 */
class Slide extends Object
{
    /**
     * @var string content part, which will be applied in [[\yii\helpers\Html::tag()]].
     */
    public $content;

    /**
     * @var string the shorthand alias which will be converted
     *             to [[background-image:url({$background})]] and them
     *             merged into other [[$options]]
     */
    public $background;

    /**
     * @var string the shorthand alias, which will be moved to
     *             [[$options['data']['hash']]]
     */
    public $hash;

    /**
     * @var mixed[] options, which will be applied in [[\yii\helpers\Html::tag()]]
     *
     * @see \romkaChev\yii2\swiper\Slide::$background
     * @see \romkaChev\yii2\swiper\Slide::$hash
     */
    public $options = [ ];

    /**
     * @param string|mixed[] $config the configuration of [[\romkaChev\yii2\swiper\Slide]]
     *                               if string given, it will be move to
     *                               [[\romkaChev\yii2\swiper\Slide::$content]] option
     *
     * @see \romkaChev\yii2\swiper\Slide::$background
     * @see \romkaChev\yii2\swiper\Slide::$hash
     * @see \romkaChev\yii2\swiper\Slide::$content
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