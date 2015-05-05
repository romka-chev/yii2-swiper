<?php
namespace romkaChev\yii2\swiper;

use yii\base\Object;
use yii\helpers\ArrayHelper;

/**
 * Slide is representation of each slide for Swiper widget.
 * If you want, you can use it directly.
 *
 * @package romkaChev\yii2\swiper
 */
class Slide extends Object
{

    /**
     * @see \romkaChev\yii2\swiper\Slide::$content
     */
    const CONTENT = 'content';
    /**
     * @see \romkaChev\yii2\swiper\Slide::$background
     */
    const BACKGROUND = 'background';
    /**
     * @see \romkaChev\yii2\swiper\Slide::$hash
     */
    const HASH = 'hash';

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
            $config = [ self::CONTENT => $config ];
        }
        $config[self::CONTENT] = ArrayHelper::getValue( $config, self::CONTENT, '' );

        if (is_array( $config[self::CONTENT] )) {
            $config[self::CONTENT] = implode( '', $config[self::CONTENT] );
        }

        $slideOptions = ArrayHelper::getValue( $config, 'options', [ ] );

        if (ArrayHelper::getValue( $config, self::BACKGROUND )) {
            $background            = ArrayHelper::getValue( $config, self::BACKGROUND );
            $slideOptions['style'] = ArrayHelper::getValue( $slideOptions, 'style', '' ) . ";background-image:url({$background});";
            $slideOptions['style'] = trim( $slideOptions['style'], ';' );
        }

        if (ArrayHelper::getValue( $config, self::HASH )) {
            $slideOptions['data']['hash'] = $config[self::HASH];
        }

        $config['options'] = array_filter( $slideOptions );

        parent::__construct( $config );
    }

}