<?php
namespace romkaChev\yii2\swiper;

use romkaChev\yii2\swiper\assets\SwiperAsset;
use romkaChev\yii2\swiper\helpers\SwiperCssHelper;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * A Swiper widget is adapter to javascript Swiper slider
 *
 * @link    http://www.idangero.us/swiper/
 *
 * @package romkaChev\yii2\swiper
 */
class Swiper extends Widget
{

    /**
     * @var string[]|mixed[]|Slide[] Contains information about slides
     *                               If you want to add some items in runtime,
     *                               you should use [[\romkaChev\yii2\swiper\Swiper::addItem]]
     *                               instead of direct items pushing.
     *
     * @see \romkaChev\yii2\swiper\Slide
     * @see \romkaChev\yii2\swiper\Swiper::$itemOptions
     * @see \romkaChev\yii2\swiper\Swiper::addItem
     * @see \romkaChev\yii2\swiper\Swiper::renderItem
     */
    public $items = [ ];

    /**
     * @var mixed[] options, which first will be merged with [[\romkaChev\yii2\swiper\Slide::$options]]
     *              for each slide, and then applied in [[\yii\helpers\Html::tag]] for rendering.
     *
     * @see \romkaChev\yii2\swiper\Swiper::normalizeOptions
     * @see \romkaChev\yii2\swiper\Swiper::renderItem
     *
     * @see \romkaChev\yii2\swiper\Slide::$options
     */
    public $itemOptions = [ ];

    /**
     * @var mixed[] Options which will be applied in [[\yii\helpers\Html::tag]].
     *              If you pass the [[id]] property, it will replace auto-generated
     *              value with custom.
     *
     * @see \romkaChev\yii2\swiper\Swiper::run
     */
    public $containerOptions = [ ];

    /**
     * @var mixed[] Options which will be applied in [[\yii\helpers\Html::tag]].
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderWrapper
     */
    public $wrapperOptions = [ ];

    /**
     * @var mixed[] The key-value storage of plugin options
     *              which will be converted to JSON and
     *              applied in Swiper plugin construction
     *
     * @see \romkaChev\yii2\swiper\Swiper::registerClientScript
     */
    public $pluginOptions = [ ];


    /**
     * @var string[] array of behaviours, which are required.
     *
     *               For example, if you need to include pagination, nextButton and prevButton
     *               you should declare them here
     *
     *               ~~~
     *               \romkaChev\yii2\swiper\Swiper::widget([
     *                  'items'      => ['slide01', 'slide02'],
     *                  'behaviours' => [
     *                      'pagination',
     *                      'nextButton',
     *                      'prevButton'
     *                  ]
     *               ]);
     *               ~~~
     *
     *               Also you can use named constants such as:
     *               - [[\romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PAGINATION]]
     *               - [[\romkaChev\yii2\swiper\Swiper::BEHAVIOUR_SCROLLBAR]]
     *               - [[\romkaChev\yii2\swiper\Swiper::BEHAVIOUR_NEXT_BUTTON]]
     *               - [[\romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PREV_BUTTON]]
     *               - [[\romkaChev\yii2\swiper\Swiper::BEHAVIOUR_RTL]]
     *               - [[\romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PARALLAX]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PAGINATION
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_SCROLLBAR
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_NEXT_BUTTON
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PREV_BUTTON
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_RTL
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PARALLAX
     */
    public $behaviours = [ ];

    /**
     * @var string[]
     */
    protected $availableBehaviours = [
        self::BEHAVIOUR_PAGINATION,
        self::BEHAVIOUR_SCROLLBAR,
        self::BEHAVIOUR_NEXT_BUTTON,
        self::BEHAVIOUR_PREV_BUTTON,
        self::BEHAVIOUR_RTL,
        self::BEHAVIOUR_PARALLAX
    ];


    /**
     * Named alias for [[\romkaChev\yii2\swiper\Swiper::$behaviours]] parallax item
     *
     * @see \romkaChev\yii2\swiper\Swiper::PARALLAX_BACKGROUND
     * @see \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION
     * @see \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION_X
     * @see \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION_Y
     * @see \romkaChev\yii2\swiper\Swiper::PARALLAX_DURATION
     *
     * @see \romkaChev\yii2\swiper\Swiper::$behaviours
     * @see \romkaChev\yii2\swiper\Swiper::$parallaxOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    const BEHAVIOUR_PARALLAX = 'parallax';
    /**
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    const PARALLAX_BACKGROUND = 'background';
    /**
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    const PARALLAX_TRANSITION = 'transition';
    /**
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    const PARALLAX_TRANSITION_X = 'transitionX';
    /**
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    const PARALLAX_TRANSITION_Y = 'transitionY';
    /**
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    const PARALLAX_DURATION = 'duration';
    /**
     * @var string[] array of options which will be applied for nextButton
     *               tag rendering in [[\yii\helpers\Html::tag]]
     *
     *               For example:
     *               ~~~
     *               \romkaChev\yii2\swiper\Swiper::widget([
     *                  'items'           => ['slide01', 'slide02'],
     *                  'parallaxOptions' => [
     *                      'background'  => 'http://lorempixel.com/1920/1080/nature/1/',
     *                      'transition'  => '-23%',
     *                      'duration'    => '300'
     *                  ]
     *               ]);
     *               ~~~
     *
     * @link http://www.idangero.us/swiper/api/ - Parallax section at the bottom
     *
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_BACKGROUND
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION_X
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION_Y
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_DURATION
     *
     * @see  \romkaChev\yii2\swiper\Swiper::renderBehaviourParallax
     */
    public $parallaxOptions = [ ];


    /**
     * Named alias for [[\romkaChev\yii2\swiper\Swiper::$behaviours]] pagination item
     *
     * @see \romkaChev\yii2\swiper\Swiper::$behaviours
     * @see \romkaChev\yii2\swiper\Swiper::$paginationOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourPagination
     */
    const BEHAVIOUR_PAGINATION = 'pagination';
    /**
     * @var mixed[] array of options which will be applied for pagination
     *              tag rendering in [[\yii\helpers\Html::tag]]
     *
     *              ~~~
     *               \romkaChev\yii2\swiper\Swiper::widget([
     *                  'items'             => ['slide01', 'slide02'],
     *                  'paginationOptions' => [
     *                      'class' => 'swiper-pagination-white',
     *                      'id'    => 'my-swiper-pagination-id',
     *                      'data'  => [
     *                          'parameter' => 'my-custom-parameter'
     *                      ]
     *                  ]
     *               ]);
     *              ~~~
     *
     * @see \romkaChev\yii2\swiper\Swiper::$scrollbarOptions
     */
    public $paginationOptions = [ ];


    /**
     * Named alias for [[\romkaChev\yii2\swiper\Swiper::$behaviours]] scrollbar item
     *
     * @see \romkaChev\yii2\swiper\Swiper::$behaviours
     * @see \romkaChev\yii2\swiper\Swiper::$scrollbarOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourScrollbar
     */
    const BEHAVIOUR_SCROLLBAR = 'scrollbar';
    /**
     * @var mixed[] array of options which will be applied for scrollbar
     *              tag rendering in [[\yii\helpers\Html::tag]]
     *
     *              ~~~
     *               \romkaChev\yii2\swiper\Swiper::widget([
     *                  'items'            => ['slide01', 'slide02'],
     *                  'scrollbarOptions' => [
     *                      'class' => 'my-custom-scrollbar-class',
     *                      'id'    => 'my-swiper-scrollbar-id',
     *                      'data'  => [
     *                          'parameter' => 'my-custom-parameter'
     *                      ]
     *                  ]
     *               ]);
     *              ~~~
     *
     * @see \romkaChev\yii2\swiper\Swiper::$paginationOptions
     */
    public $scrollbarOptions = [ ];


    /**
     * Named alias for [[\romkaChev\yii2\swiper\Swiper::$behaviours]] nextButton item
     *
     * @see \romkaChev\yii2\swiper\Swiper::$behaviours
     * @see \romkaChev\yii2\swiper\Swiper::$nextButtonOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourNextButton
     */
    const BEHAVIOUR_NEXT_BUTTON = 'nextButton';
    /**
     * @var mixed[] array of options which will be applied for nextButton
     *              tag rendering in [[\yii\helpers\Html::tag]]
     *
     *              ~~~
     *               \romkaChev\yii2\swiper\Swiper::widget([
     *                  'items'             => ['slide01', 'slide02'],
     *                  'nextButtonOptions' => [
     *                      'class' => 'my-custom-next-button-class',
     *                      'id'    => 'my-swiper-next-button-id',
     *                      'data'  => [
     *                          'parameter' => 'my-custom-parameter'
     *                      ]
     *                  ]
     *               ]);
     *              ~~~
     *
     * @see \romkaChev\yii2\swiper\Swiper::$prevButtonOptions
     */
    public $nextButtonOptions = [ ];


    /**
     * Named alias for [[\romkaChev\yii2\swiper\Swiper::$behaviours]] prevButton item
     *
     * @see \romkaChev\yii2\swiper\Swiper::$behaviours
     * @see \romkaChev\yii2\swiper\Swiper::$prevButtonOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourPrevButton
     */
    const BEHAVIOUR_PREV_BUTTON = 'prevButton';
    /**
     * @var mixed[] array of options which will be applied for prevButton
     *              tag rendering in [[\yii\helpers\Html::tag]]
     *
     *              ~~~
     *               \romkaChev\yii2\swiper\Swiper::widget([
     *                  'items'             => ['slide01', 'slide02'],
     *                  'nextButtonOptions' => [
     *                      'class' => 'my-custom-prev-button-class',
     *                      'id'    => 'my-swiper-prev-button-id',
     *                      'data'  => [
     *                          'parameter' => 'my-custom-parameter'
     *                      ]
     *                  ]
     *               ]);
     *              ~~~
     *
     * @see \romkaChev\yii2\swiper\Swiper::$nextButtonOptions
     */
    public $prevButtonOptions = [ ];


    /**
     * Named alias for [[\romkaChev\yii2\swiper\Swiper::$behaviours]] rtl item
     *
     * @see \romkaChev\yii2\swiper\Swiper::$behaviours
     *
     * @see \romkaChev\yii2\swiper\Swiper::setBehaviourRtl
     */
    const BEHAVIOUR_RTL = 'rtl';


    /**
     * This function is batch-wrapper of \romkaChev\yii2\swiper\Swiper::addItem
     *
     * @param string[]|mixed[][]|Slide[] $items batch of items
     *                                          to be added into slider
     *
     * @see \romkaChev\yii2\swiper\Swiper::addItem
     * @see \romkaChev\yii2\swiper\Swiper::$items
     * @see \romkaChev\yii2\swiper\Slide
     *
     * @return Swiper
     */
    public function addItems( array $items = [ ] )
    {
        foreach ($items as $item) {
            $this->addItem( $item );
        }

        return $this;
    }

    /**
     * If you wants to add an item to collection in runtime,
     * you should use this instead of direct items pushing to collection,
     * because it supports configuring slides from strings and arrays.
     *
     * Also it merges [[\romkaChev\yii2\swiper\Swiper::$itemOptions]]
     * with concrete item options.
     *
     * @param string|mixed[]|Slide $item The content, or configuration,
     *                                   or [[\romkaChev\yii2\swiper\Slide]] itself.
     *
     * @see \romkaChev\yii2\swiper\Swiper::$items
     * @see \romkaChev\yii2\swiper\Slide
     *
     * @return Swiper
     */
    public function addItem( $item = [ ] )
    {
        $this->items[] = $this->normalizeItem( $item, count( $this->items ) );

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $contentPieces = [
            $this->renderBehaviourParallax(),
            $this->renderWrapper(),
            $this->renderBehaviourPagination(),
            $this->renderBehaviourScrollbar(),
            $this->renderBehaviourNextButton(),
            $this->renderBehaviourPrevButton()
        ];

        $this->setBehaviourRtl();

        $this->registerClientScript();

        $containerOptions  = $this->containerOptions;
        $containerTag      = ArrayHelper::remove( $containerOptions, 'tag', 'div' );
        $renderedContainer = Html::tag( $containerTag, implode( PHP_EOL, $contentPieces ), $containerOptions );

        return $renderedContainer;
    }

    /**
     * This function check if there is wrong behaviours
     * and call normalizing of items and every options
     *
     * @see \romkaChev\yii2\swiper\Swiper::checkBehaviours
     *
     * @see \romkaChev\yii2\swiper\Swiper::normalizeOptions
     * @see \romkaChev\yii2\swiper\Swiper::normalizeItems
     */
    public function init()
    {
        $this->checkBehaviours();

        $this->normalizeOptions();
        $this->normalizeItems();
    }

    /**
     * This function sets default values to options of widget
     * such as [[id]] and [[class]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::$containerOptions
     * @see \romkaChev\yii2\swiper\Swiper::$wrapperOptions
     * @see \romkaChev\yii2\swiper\Swiper::$paginationOptions
     * @see \romkaChev\yii2\swiper\Swiper::$scrollbarOptions
     * @see \romkaChev\yii2\swiper\Swiper::$nextButtonOptions
     * @see \romkaChev\yii2\swiper\Swiper::$prevButtonOptions
     * @see \romkaChev\yii2\swiper\Swiper::$parallaxOptions
     * @see \romkaChev\yii2\swiper\Swiper::$itemOptions
     */
    protected function normalizeOptions()
    {
        $id = ArrayHelper::getValue( $this->containerOptions, 'id', $this->getId() );

        //@formatter:off

        $this->itemOptions['options']          = ArrayHelper::getValue($this->itemOptions,                  'options', []);
        $this->itemOptions['options']['data']  = ArrayHelper::getValue($this->itemOptions['options'],       'data', []);
        $this->itemOptions['options']['class'] = trim(ArrayHelper::getValue($this->itemOptions['options'],  'class', '') . ' swiper-slide', ' ');

        $this->containerOptions['id']     = $id;
        $this->containerOptions['class']  = trim(ArrayHelper::getValue($this->containerOptions,  'class', '') . ' swiper-container', ' ');

        $this->wrapperOptions['id']       = ArrayHelper::getValue($this->wrapperOptions,    'id', "{$id}-wrapper");
        $this->wrapperOptions['class']    = trim(ArrayHelper::getValue($this->wrapperOptions,    'class', '') . ' swiper-wrapper', ' ');

        $this->paginationOptions['id']    = ArrayHelper::getValue($this->paginationOptions, 'id', "{$id}-pagination");
        $this->paginationOptions['class'] = trim(ArrayHelper::getValue($this->paginationOptions, 'class', '') . ' swiper-pagination', ' ');

        $this->scrollbarOptions['id']     = ArrayHelper::getValue($this->scrollbarOptions,  'id', "{$id}-scrollbar");
        $this->scrollbarOptions['class']  = trim(ArrayHelper::getValue($this->scrollbarOptions,  'class', '') . ' swiper-scrollbar', ' ');

        $this->nextButtonOptions['id']    = ArrayHelper::getValue($this->nextButtonOptions, 'id', "{$id}-button-next");
        $this->nextButtonOptions['class'] = trim(ArrayHelper::getValue($this->nextButtonOptions, 'class', '') . ' swiper-button-next', ' ');

        $this->prevButtonOptions['id']    = ArrayHelper::getValue($this->prevButtonOptions, 'id', "{$id}-button-prev");
        $this->prevButtonOptions['class'] = trim(ArrayHelper::getValue($this->prevButtonOptions, 'class', '') . ' swiper-button-prev', ' ');

        $this->parallaxOptions['id']      = ArrayHelper::getValue($this->parallaxOptions,   'id', "{$id}-parallax");
        $this->parallaxOptions['class']   = trim(ArrayHelper::getValue($this->parallaxOptions,   'class', '') . ' parallax-bg', ' ');
        $this->parallaxOptions['data']    = ArrayHelper::getValue($this->parallaxOptions,   'data', []);

        /**
         * Parallax options, specified via shorthands, have more priority
         * than directly specified options
         */
        $this->parallaxOptions['data']['swiper-parallax']          = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_TRANSITION,   ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax',          null) );
        $this->parallaxOptions['data']['swiper-parallax-x']        = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_TRANSITION_X, ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax-x',        null) );
        $this->parallaxOptions['data']['swiper-parallax-y']        = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_TRANSITION_Y, ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax-y',        null) );
        $this->parallaxOptions['data']['swiper-parallax-duration'] = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_DURATION,     ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax-duration', null) );

        $this->parallaxOptions[self::PARALLAX_TRANSITION]          = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_TRANSITION,   ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax',          null) );
        $this->parallaxOptions[self::PARALLAX_TRANSITION_X]        = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_TRANSITION_X, ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax-x',        null) );
        $this->parallaxOptions[self::PARALLAX_TRANSITION_Y]        = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_TRANSITION_Y, ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax-y',        null) );
        $this->parallaxOptions[self::PARALLAX_DURATION]            = ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_DURATION,     ArrayHelper::getValue( $this->parallaxOptions['data'], 'swiper-parallax-duration', null) );

        $this->parallaxOptions['data'] = array_filter( $this->parallaxOptions['data'] );

        //@formatter:on

        if (ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_BACKGROUND )) {

            $this->parallaxOptions['style'] = SwiperCssHelper::mergeStyleAndBackground(
                ArrayHelper::getValue( $this->parallaxOptions, self::PARALLAX_BACKGROUND, '' ),
                ArrayHelper::getValue( $this->parallaxOptions, 'style', '' )
            );

        } elseif (ArrayHelper::getValue( $this->parallaxOptions, 'style' )) {

            $this->parallaxOptions[self::PARALLAX_BACKGROUND] = SwiperCssHelper::getBackgroundUrl(
                $this->parallaxOptions['style']
            );

        }
    }

    /**
     * This function converts non-[[\romkaChev\yii2\swiper\Slide]] items
     * to [[\romkaChev\yii2\swiper\Slide]] respectively
     *
     * Then it merges [[\romkaChev\yii2\swiper\Swiper::$itemOptions]] with
     * concrete item options
     *
     */
    protected function normalizeItems()
    {
        foreach ($this->items as $index => $item) {
            $this->items[$index] = $this->normalizeItem( $item, $index );
        }
    }

    /**
     * This function converts non-[[\romkaChev\yii2\swiper\Slide]] item
     * to [[\romkaChev\yii2\swiper\Slide]], merging batch options,
     * automatically sets id and class and so on...
     *
     * @param string|mixed[]|Slide $item
     * @param int                  $index
     *
     * @return Slide
     */
    protected function normalizeItem( $item, $index )
    {
        /**
         * If concrete \romkaChev\yii2\swiper\Slide given
         * then it is meant to be fully custom-configured
         * and it will not be managed there.
         */
        if ($item instanceof Slide) {
            return $item;
        }

        $item = is_string( $item )
            ? [ 'content' => $item ]
            : $item;

        $itemOptions = $this->itemOptions;

        /**
         * Id must be unique and batch value cannot be applied
         */
        ArrayHelper::remove( $itemOptions['options'], 'id' );
        /**
         * Hash must be unique too
         */
        ArrayHelper::remove( $itemOptions, 'hash' );
        ArrayHelper::remove( $itemOptions['options']['data'], 'hash' );

        $item['options'] = ArrayHelper::getValue( $item, 'options', [ ] );

        $itemClass                = ArrayHelper::getValue( $item['options'], 'class', '' );
        $item['options']['id']    = ArrayHelper::getValue( $item['options'], 'id', "{$this->containerOptions['id']}-slide-{$index}" );
        $item['options']['class'] = trim( ArrayHelper::getValue( $itemOptions['options'], 'class', '' ) . " {$itemClass}", ' ' );


        $item = array_replace_recursive( $itemOptions, $item );

        return new Slide( $item );
    }

    /**
     * Checks if there is invalid behaviour given.
     * If given, then throws exception
     *
     * @throws \InvalidArgumentException
     */
    protected function checkBehaviours()
    {
        foreach ($this->behaviours as $behaviour) {
            if ( ! in_array( $behaviour, $this->availableBehaviours )) {
                throw new \InvalidArgumentException( "Unknown behaviour {$behaviour}" );
            }
        }
    }

    /**
     * This function renders parallax part of widget
     *
     * More information about parallax you can find
     * in official site of plugin - http://www.idangero.us/swiper/api/
     *
     * Also you can find some examples in [[~/yii2-swiper/demos]] folder
     *
     * @link http://www.idangero.us/swiper/api/ - Parallax section at the bottom
     *
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_BACKGROUND
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION_X
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_TRANSITION_Y
     * @see  \romkaChev\yii2\swiper\Swiper::PARALLAX_DURATION
     *
     * @see  \romkaChev\yii2\swiper\Swiper::$parallaxOptions
     *
     * @return string
     */
    protected function renderBehaviourParallax()
    {
        if ( ! in_array( self::BEHAVIOUR_PARALLAX, $this->behaviours )) {
            return '';
        }

        $parallaxOptions = $this->parallaxOptions;
        $parallaxTag     = ArrayHelper::remove( $parallaxOptions, 'tag', 'div' );

        ArrayHelper::remove( $parallaxOptions, self::PARALLAX_BACKGROUND );
        ArrayHelper::remove( $parallaxOptions, self::PARALLAX_TRANSITION );
        ArrayHelper::remove( $parallaxOptions, self::PARALLAX_TRANSITION_X );
        ArrayHelper::remove( $parallaxOptions, self::PARALLAX_TRANSITION_Y );
        ArrayHelper::remove( $parallaxOptions, self::PARALLAX_DURATION );

        return Html::tag( $parallaxTag, '', $parallaxOptions );
    }

    /**
     * This function renders pagination part of widget
     *
     * More information about pagination you can find
     * in official site of plugin - http://www.idangero.us/swiper/api/
     *
     * Also you can find some examples in [[~/yii2-swiper/demos]] folder
     *
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PAGINATION
     * @see \romkaChev\yii2\swiper\Swiper::$paginationOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourScrollbar
     *
     * @return string
     */
    protected function renderBehaviourPagination()
    {
        if (in_array( self::BEHAVIOUR_PAGINATION, $this->behaviours )) {
            $paginationOptions = $this->paginationOptions;
            $paginationTag     = ArrayHelper::remove( $paginationOptions, 'tag', 'div' );

            if ( ! isset( $this->pluginOptions[self::OPTION_PAGINATION] )) {
                $this->pluginOptions[self::OPTION_PAGINATION] = "#" . $paginationOptions["id"];
            }

            return Html::tag( $paginationTag, '', $paginationOptions );
        }

        return '';
    }

    /**
     * This function renders scrollbar part of widget
     *
     * More information about scrollbar you can find
     * in official site of plugin - http://www.idangero.us/swiper/api/
     *
     * Also you can find some examples in [[~/yii2-swiper/demos]] folder
     *
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_SCROLLBAR
     * @see \romkaChev\yii2\swiper\Swiper::$scrollbarOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourPagination
     *
     * @return string
     */
    protected function renderBehaviourScrollbar()
    {

        if (in_array( self::BEHAVIOUR_SCROLLBAR, $this->behaviours )) {
            $scrollbarOptions = $this->scrollbarOptions;
            $scrollbarTag     = ArrayHelper::remove( $scrollbarOptions, 'tag', 'div' );

            if ( ! isset( $this->pluginOptions[self::OPTION_SCROLLBAR] )) {
                $this->pluginOptions[self::OPTION_SCROLLBAR] = "#" . $scrollbarOptions["id"];
            }

            return Html::tag( $scrollbarTag, '', $scrollbarOptions );
        }

        return '';
    }

    /**
     * This function renders nextButton part of widget
     *
     * More information about nextButton you can find
     * in official site of plugin - http://www.idangero.us/swiper/api/
     *
     * Also you can find some examples in [[~/yii2-swiper/demos]] folder
     *
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_NEXT_BUTTON
     * @see \romkaChev\yii2\swiper\Swiper::$nextButtonOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourPrevButton
     *
     * @return string
     */
    protected function renderBehaviourNextButton()
    {

        if (in_array( self::BEHAVIOUR_NEXT_BUTTON, $this->behaviours )) {
            $nextButtonOptions = $this->nextButtonOptions;
            $nextButtonTag     = ArrayHelper::remove( $nextButtonOptions, 'tag', 'div' );

            if ( ! isset( $this->pluginOptions[self::OPTION_NEXT_BUTTON] )) {
                $this->pluginOptions[self::OPTION_NEXT_BUTTON] = "#" . $nextButtonOptions["id"];
            }

            return Html::tag( $nextButtonTag, '', $nextButtonOptions );
        }

        return '';
    }

    /**
     * This function renders prevButton part of widget
     *
     * More information about prevButton you can find
     * in official site of plugin - http://www.idangero.us/swiper/api/
     *
     * Also you can find some examples in [[~/yii2-swiper/demos]] folder
     *
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_PREV_BUTTON
     * @see \romkaChev\yii2\swiper\Swiper::$prevButtonOptions
     *
     * @see \romkaChev\yii2\swiper\Swiper::renderBehaviourNextButton
     *
     * @return string
     */
    protected function renderBehaviourPrevButton()
    {

        if (in_array( self::BEHAVIOUR_PREV_BUTTON, $this->behaviours )) {
            $prevButtonOptions = $this->prevButtonOptions;
            $prevButtonTag     = ArrayHelper::remove( $prevButtonOptions, 'tag', 'div' );

            if ( ! isset( $this->pluginOptions[self::OPTION_PREV_BUTTON] )) {
                $this->pluginOptions[self::OPTION_PREV_BUTTON] = "#" . $prevButtonOptions["id"];
            }

            return Html::tag( $prevButtonTag, '', $prevButtonOptions );
        }

        return '';
    }

    /**
     * This function adds [[dir=rtl]] tag option to [[\romkaChev\yii2\swiper\Swiper::$containerOptions]]
     *
     * More information about rtl you can find
     * in official site of plugin - http://www.idangero.us/swiper/api/
     *
     * Also you can find some examples in [[~/yii2-swiper/demos]] folder
     *
     * @see \romkaChev\yii2\swiper\Swiper::BEHAVIOUR_RTL
     *
     * @return Swiper
     */
    protected function setBehaviourRtl()
    {
        if (in_array( self::BEHAVIOUR_RTL, $this->behaviours )) {
            $this->containerOptions["dir"] = 'rtl';
        }

        return $this;
    }

    /**
     * This function renders the wrapper tag of swiper,
     * which contains slides
     *
     * @see \romkaChev\yii2\swiper\Swiper::$wrapperOptions
     * @see \romkaChev\yii2\swiper\Swiper::renderItems
     *
     * @return string
     */
    protected function renderWrapper()
    {
        $renderedItems = $this->renderItems( $this->items );

        $wrapperOptions  = $this->wrapperOptions;
        $wrapperTag      = ArrayHelper::remove( $wrapperOptions, 'tag', 'div' );
        $renderedWrapper = Html::tag( $wrapperTag, PHP_EOL . $renderedItems . PHP_EOL, $wrapperOptions );

        return PHP_EOL . $renderedWrapper . PHP_EOL;
    }

    /**
     * This function just calls [[\romkaChev\yii2\swiper\Swiper::renderItem]]
     * for each [[\romkaChev\yii2\swiper\Swiper::$items]] and returns
     * formatter result
     *
     * @param Slide[] $items
     *
     * @return string
     */
    protected function renderItems( array $items )
    {
        $renderedItems = [ ];
        foreach ($items as $index => $item) {
            $renderedItems[] = $this->renderItem( $item );
        }

        return implode( PHP_EOL, $renderedItems );
    }

    /**
     * @param Slide $slide
     *
     * @see \romkaChev\yii2\swiper\Swiper::$items
     * @see \romkaChev\yii2\swiper\Swiper::$itemOptions
     *
     * @return string
     */
    protected function renderItem( Slide $slide )
    {
        $options = $slide->options;
        $tag     = ArrayHelper::remove( $options, 'tag', 'div' );

        return Html::tag( $tag, $slide->content, $options );
    }

    /**
     * Registers the initializer of Swiper plugin
     *
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     * @return Swiper
     */
    protected function registerClientScript()
    {
        $view = $this->getView();
        SwiperAsset::register( $view );

        $id            = $this->containerOptions['id'];
        $pluginOptions = Json::encode( $this->pluginOptions );
        $variableName  = 'swiper' . Inflector::id2camel( $this->containerOptions['id'] );

        $view->registerJs( new JsExpression( <<<JS
        //noinspection JSUnnecessarySemicolon
        ;var {$variableName} = new Swiper('#{$id}', {$pluginOptions});
JS
            )
        );

        return $this;
    }

    //<editor-fold desc="Named constants for Swiper options">

    const OPTION_INITIAL_SLIDE                    = 'initialSlide';
    const OPTION_DIRECTION                        = 'direction';
    const OPTION_SPEED                            = 'speed';
    const OPTION_SET_WRAPPER_SIZE                 = 'setWrapperSize';
    const OPTION_VIRTUAL_TRANSLATE                = 'virtualTranslate';
    const OPTION_WIDTH                            = 'width';
    const OPTION_HEIGHT                           = 'height';
    const OPTION_AUTOPLAY                         = 'autoplay';
    const OPTION_AUTOPLAY_DISABLE_ON_INTERACTION  = 'autoplayDisableOnInteraction';
    const OPTION_WATCH_SLIDES_PROGRESS            = 'watchSlidesProgress';
    const OPTION_WATCH_SLIDES_VISIBILITY          = 'watchSlidesVisibility';
    const OPTION_FREE_MODE                        = 'freeMode';
    const OPTION_FREE_MODE_MOMENTUM               = 'freeModeMomentum';
    const OPTION_FREE_MODE_MOMENTUM_RATIO         = 'freeModeMomentumRatio';
    const OPTION_FREE_MODE_MOMENTUM_BOUNCE        = 'freeModeMomentumBounce';
    const OPTION_FREE_MODE_MOMENTUM_BOUNCE_RATIO  = 'freeModeMomentumBounceRatio';
    const OPTION_FREE_MODE_STICKY                 = 'freeModeSticky';
    const OPTION_EFFECT                           = 'effect';
    const OPTION_FADE                             = 'fade';
    const OPTION_FADE_CROSS_FADE                  = 'crossFade';
    const OPTION_CUBE                             = 'cube';
    const OPTION_CUBE_SLIDE_SHADOWS               = 'slideShadows';
    const OPTION_CUBE_SHADOW                      = 'shadow';
    const OPTION_CUBE_SHADOW_OFFSET               = 'shadowOffset';
    const OPTION_CUBE_SHADOW_SCALE                = 'shadowScale';
    const OPTION_COVERFLOW                        = 'coverflow';
    const OPTION_COVERFLOW_ROTATE                 = 'rotate';
    const OPTION_COVERFLOW_STRETCH                = 'stretch';
    const OPTION_COVERFLOW_DEPTH                  = 'depth';
    const OPTION_COVERFLOW_MODIFIER               = 'modifier';
    const OPTION_COVERFLOW_SLIDE_SHADOWS          = 'slideShadows';
    const OPTION_PARALLAX                         = 'parallax';
    const OPTION_SPACE_BETWEEN                    = 'spaceBetween';
    const OPTION_SLIDES_PER_VIEW                  = 'slidesPerView';
    const OPTION_SLIDES_PER_COLUMN                = 'slidesPerColumn';
    const OPTION_SLIDES_PER_COLUMN_FILL           = 'slidesPerColumnFill';
    const OPTION_SLIDES_PER_GROUP                 = 'slidesPerGroup';
    const OPTION_CENTERED_SLIDES                  = 'centeredSlides';
    const OPTION_GRAB_CURSOR                      = 'grabCursor';
    const OPTION_TOUCH_RATIO                      = 'touchRatio';
    const OPTION_TOUCH_ANGLE                      = 'touchAngle';
    const OPTION_SIMULATE_TOUCH                   = 'simulateTouch';
    const OPTION_SHORT_SWIPES                     = 'shortSwipes';
    const OPTION_LONG_SWIPES                      = 'longSwipes';
    const OPTION_LONGS_WIPES_RATIO                = 'longSwipesRatio';
    const OPTION_LONG_SWIPES_MS                   = 'longSwipesMs';
    const OPTION_FOLLOW_FINGER                    = 'followFinger';
    const OPTION_ONLY_EXTERNAL                    = 'onlyExternal';
    const OPTION_THRESHOLD                        = 'threshold';
    const OPTION_TOUCH_MOVE_STOP_PROPAGATION      = 'touchMoveStopPropagation';
    const OPTION_RESISTANCE                       = 'resistance';
    const OPTION_RESISTANCE_RATIO                 = 'resistanceRatio';
    const OPTION_PREVENT_CLICKS                   = 'preventClicks';
    const OPTION_PREVENT_CLICKS_PROPAGATION       = 'preventClicksPropagation';
    const OPTION_SLIDE_TO_CLICKED_SLIDE           = 'slideToClickedSlide';
    const OPTION_ALLOW_SWIPE_TO_PREV              = 'allowSwipeToPrev';
    const OPTION_ALLOW_SWIPE_TO_NEXT              = 'allowSwipeToNext';
    const OPTION_NO_SWIPING                       = 'noSwiping';
    const OPTION_NO_SWIPING_CLASS                 = 'noSwipingClass';
    const OPTION_SWIPE_HANDLER                    = 'swipeHandler';
    const OPTION_PAGINATION                       = 'pagination';
    const OPTION_PAGINATION_HIDE                  = 'paginationHide';
    const OPTION_PAGINATION_CLICKABLE             = 'paginationClickable';
    const OPTION_PAGINATION_BULLET_RENDER         = 'paginationBulletRender';
    const OPTION_NEXT_BUTTON                      = 'nextButton';
    const OPTION_PREV_BUTTON                      = 'prevButton';
    const OPTION_A11Y                             = 'a11y';
    const OPTION_PREV_SLIDE_MESSAGE               = 'prevSlideMessage';
    const OPTION_NEXT_SLIDE_MESSAGE               = 'nextSlideMessage';
    const OPTION_FIRST_SLIDE_MESSAGE              = 'firstSlideMessage';
    const OPTION_LAST_SLIDE_MESSAGE               = 'lastSlideMessage';
    const OPTION_SCROLLBAR                        = 'scrollbar';
    const OPTION_SCROLLBAR_HIDE                   = 'scrollbarHide';
    const OPTION_KEYBOARD_CONTROL                 = 'keyboardControl';
    const OPTION_MOUSEWHEEL_CONTROL               = 'mousewheelControl';
    const OPTION_MOUSEWHEEL_FORCE_TO_AXIS         = 'mousewheelForceToAxis';
    const OPTION_MOUSEWHEEL_RELEASE_ON_EDGES      = 'mousewheelReleaseOnEdges';
    const OPTION_MOUSEWHEEL_INVERT                = 'mousewheelInvert';
    const OPTION_HASHNAV                          = 'hashnav';
    const OPTION_PRELOAD_IMAGES                   = 'preloadImages';
    const OPTION_UPDATE_ON_IMAGES_READY           = 'updateOnImagesReady';
    const OPTION_LAZY_LOADING                     = 'lazyLoading';
    const OPTION_LAZY_LOADING_IN_PREV_NEXT        = 'lazyLoadingInPrevNext';
    const OPTION_LAZY_LOADING_ON_TRANSITION_START = 'lazyLoadingOnTransitionStart';
    const OPTION_LOOP                             = 'loop';
    const OPTION_LOOP_ADDITIONAL_SLIDES           = 'loopAdditionalSlides';
    const OPTION_LOOPED_SLIDES                    = 'loopedSlides';
    const OPTION_CONTROL                          = 'control';
    const OPTION_CONTROL_INVERSE                  = 'controlInverse';
    const OPTION_OBSERVER                         = 'observer';
    const OPTION_OBSERVE_PARENTS                  = 'observeParents';
    const OPTION_RUN_CALLBACKS_ON_INIT            = 'runCallbacksOnInit';
    const OPTION_ON_INIT                          = 'onInit';
    const OPTION_ON_SLIDE_CHANGE_START            = 'onSlideChangeStart';
    const OPTION_ON_SLIDE_CHANGE_END              = 'onSlideChangeEnd';
    const OPTION_ON_TRANSITION_START              = 'onTransitionStart';
    const OPTION_ON_TRANSITION_END                = 'onTransitionEnd';
    const OPTION_ON_TOUCH_START                   = 'onTouchStart';
    const OPTION_ON_TOUCH_MOVE                    = 'onTouchMove';
    const OPTION_ON_TOUCH_MOVE_OPPOSITE           = 'onTouchMoveOpposite';
    const OPTION_ON_SLIDER_MOVE                   = 'onSliderMove';
    const OPTION_ON_TOUCH_END                     = 'onTouchEnd';
    const OPTION_ON_CLICK                         = 'onClick';
    const OPTION_ON_TAP                           = 'onTap';
    const OPTION_ON_DOUBLE_TAP                    = 'onDoubleTap';
    const OPTION_ON_IMAGES_READY                  = 'onImagesReady';
    const OPTION_ON_PROGRESS                      = 'onProgress';
    const OPTION_ON_REACH_BEGINNING               = 'onReachBeginning';
    const OPTION_ON_REACH_END                     = 'onReachEnd';
    const OPTION_ON_DESTROY                       = 'onDestroy';
    const OPTION_ON_SET_TRANSLATE                 = 'onSetTranslate';
    const OPTION_ON_SET_TRANSITION                = 'onSetTransition';
    const OPTION_ON_AUTOPLAY_START                = 'onAutoplayStart';
    const OPTION_ON_AUTOPLAY_STOP                 = 'onAutoplayStop';
    const OPTION_ON_LAZY_IMAGE_LOAD               = 'onLazyImageLoad';
    const OPTION_ON_LAZY_IMAGE_READY              = 'onLazyImageReady';
    const OPTION_SLIDE_CLASS                      = 'slideClass';
    const OPTION_SLIDE_ACTIVE_CLASS               = 'slideActiveClass';
    const OPTION_SLIDE_VISIBLE_CLASS              = 'slideVisibleClass';
    const OPTION_SLIDE_DUPLICATE_CLASS            = 'slideDuplicateClass';
    const OPTION_SLIDE_NEXT_CLASS                 = 'slideNextClass';
    const OPTION_SLIDE_PREV_CLASS                 = 'slidePrevClass';
    const OPTION_WRAPPER_CLASS                    = 'wrapperClass';
    const OPTION_BULLET_CLASS                     = 'bulletClass';
    const OPTION_BULLET_ACTIVE_CLASS              = 'bulletActiveClass';
    const OPTION_PAGINATION_HIDDEN_CLASS          = 'paginationHiddenClass';
    const OPTION_BUTTON_DISABLED_CLASS            = 'buttonDisabledClass';


    /**
     * Named alias for [[direction]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_DIRECTION
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const DIRECTION_HORIZONTAL = 'horizontal';
    /**
     * Named alias for [[direction]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_DIRECTION
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const DIRECTION_VERTICAL = 'vertical';

    /**
     * Named alias for [[effect]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_EFFECT
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const EFFECT_FADE = 'fade';
    /**
     * Named alias for [[effect]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_EFFECT
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const EFFECT_CUBE = 'cube';
    /**
     * Named alias for [[effect]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_EFFECT
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const EFFECT_COVERFLOW = 'coverflow';

    /**
     * Named alias for [[slidesPerView]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_SLIDES_PER_VIEW
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const SLIDES_PER_VIEW_AUTO = 'auto';

    /**
     * Named alias for [[slidesPerColumnFill]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_SLIDES_PER_COLUMN_FILL
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const SLIDES_PER_COLUMN_FILL_COLUMN = 'column';
    /**
     * Named alias for [[slidesPerColumnFill]] option
     * in [[\romkaChev\yii2\swiper\Swiper::$pluginOptions]]
     *
     * @see \romkaChev\yii2\swiper\Swiper::OPTION_SLIDES_PER_COLUMN_FILL
     * @see \romkaChev\yii2\swiper\Swiper::$pluginOptions
     */
    const SLIDES_PER_COLUMN_FILL_ROW = 'row';

    //</editor-fold>

}
