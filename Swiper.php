<?php
namespace romkaChev\yii2\swiper;

use romkaChev\yii2\swiper\assets\SwiperAsset;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\JsExpression;

class Swiper extends Widget
{

    //<editor-fold desc="swiper options">
    const OPTION_INITIAL_SLIDE = 'initialSlide';
    const OPTION_DIRECTION     = 'direction';
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
    //</editor-fold>

    const DIRECTION_HORIZONTAL = 'horizontal';
    const DIRECTION_VERTICAL   = 'vertical';

    const EFFECT_FADE      = 'fade';
    const EFFECT_CUBE      = 'cube';
    const EFFECT_COVERFLOW = 'coverflow';

    const SLIDES_PER_VIEW_AUTO          = 'auto';
    const SLIDES_PER_COLUMN_FILL_COLUMN = 'column';
    const SLIDES_PER_COLUMN_FILL_ROW    = 'row';

    const BEHAVIOUR_PAGINATION  = 'pagination';
    const BEHAVIOUR_SCROLLBAR   = 'scrollbar';
    const BEHAVIOUR_NEXT_BUTTON = 'nextButton';
    const BEHAVIOUR_PREV_BUTTON = 'prevButton';
    const BEHAVIOUR_RTL         = 'rtl';
    const BEHAVIOUR_PARALLAX    = 'parallax';

    const PARALLAX_BACKGROUND   = 'background';
    const PARALLAX_TRANSITION   = 'transition';
    const PARALLAX_TRANSITION_X = 'transitionX';
    const PARALLAX_TRANSITION_Y = 'transitionY';
    const PARALLAX_DURATION     = 'duration';
    /**
     * @var string[]
     */
    public $behaviours = [ ];
    /**
     * @var mixed[]
     */
    public $paginationOptions = [ ];
    /**
     * @var mixed[]
     */
    public $scrollbarOptions = [ ];
    /**
     * @var mixed[]
     */
    public $prevButtonOptions = [ ];
    /**
     * @var mixed[]
     */
    public $nextButtonOptions = [ ];
    /**
     * @var mixed[]
     */
    public $parallaxOptions = [ ];
    /**
     * @var mixed[]
     */
    public $items = [ ];
    /**
     * @var mixed[]
     */
    public $containerOptions = [ ];
    /**
     * @var mixed[]
     */
    public $wrapperOptions = [ ];
    /**
     * @var mixed[]
     */
    public $options = [ ];
    /**
     * @var mixed[]
     */
    public $itemOptions = [ ];
    /**
     * @var mixed[]
     */
    public $pluginOptions = [ ];
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
     * @inheritdoc
     */
    public function init()
    {
        $this->normalizeBehaviours();
        $this->normalizeOptions();
    }

    /**
     *
     */
    protected function normalizeBehaviours()
    {
        foreach ($this->behaviours as $behaviour) {
            if ( ! in_array( $behaviour, $this->availableBehaviours )) {
                throw new \InvalidArgumentException( "Unknown behaviour {$behaviour}" );
            }
        }
    }

    /**
     * Preparing some options for this widgets
     */
    protected function normalizeOptions()
    {
        $generatedId = $this->getId();

        if ( ! isset( $this->containerOptions['tag'] ) || empty( $this->containerOptions['tag'] )) {
            $this->containerOptions['tag'] = 'div';
        }
        if ( ! isset( $this->containerOptions['id'] ) || empty( $this->containerOptions['id'] )) {
            $this->containerOptions['id'] = $generatedId;
        }
        if ( ! isset( $this->containerOptions['class'] ) || empty( $this->containerOptions['class'] )) {
            $this->containerOptions['class'] = 'swiper-container';
        } else {
            $this->containerOptions['class'] = implode( " ", [ 'swiper-container', $this->containerOptions['class'] ] );
        }

        if ( ! isset( $this->wrapperOptions['tag'] ) || empty( $this->wrapperOptions['tag'] )) {
            $this->wrapperOptions['tag'] = 'div';
        }
        if ( ! isset( $this->wrapperOptions['id'] ) || empty( $this->wrapperOptions['id'] )) {
            $this->wrapperOptions['id'] = "{$this->containerOptions['id']}-wrapper";
        }
        if ( ! isset( $this->wrapperOptions['class'] ) || empty( $this->wrapperOptions['class'] )) {
            $this->wrapperOptions['class'] = 'swiper-wrapper';
        } else {
            $this->wrapperOptions['class'] = implode( " ", [ 'swiper-wrapper', $this->wrapperOptions['class'] ] );
        }

        if ( ! isset( $this->paginationOptions['tag'] ) || empty( $this->paginationOptions['tag'] )) {
            $this->paginationOptions['tag'] = 'div';
        }
        if ( ! isset( $this->paginationOptions['id'] ) || empty( $this->paginationOptions['id'] )) {
            $this->paginationOptions['id'] = "{$this->containerOptions['id']}-swiper-pagination";
        }
        if ( ! isset( $this->paginationOptions['class'] ) || empty( $this->paginationOptions['class'] )) {
            $this->paginationOptions['class'] = 'swiper-pagination';
        } else {
            $this->paginationOptions['class'] = implode( " ", [ 'swiper-pagination', $this->paginationOptions['class'] ] );
        }

        if ( ! isset( $this->scrollbarOptions['tag'] ) || empty( $this->scrollbarOptions['tag'] )) {
            $this->scrollbarOptions['tag'] = 'div';
        }
        if ( ! isset( $this->scrollbarOptions['id'] ) || empty( $this->scrollbarOptions['id'] )) {
            $this->scrollbarOptions['id'] = "{$this->containerOptions['id']}-swiper-scrollbar";
        }
        if ( ! isset( $this->scrollbarOptions['class'] ) || empty( $this->scrollbarOptions['class'] )) {
            $this->scrollbarOptions['class'] = 'swiper-scrollbar';
        } else {
            $this->scrollbarOptions['class'] = implode( " ", [ 'swiper-scrollbar', $this->scrollbarOptions['class'] ] );
        }

        if ( ! isset( $this->nextButtonOptions['tag'] ) || empty( $this->nextButtonOptions['tag'] )) {
            $this->nextButtonOptions['tag'] = 'div';
        }
        if ( ! isset( $this->nextButtonOptions['id'] ) || empty( $this->nextButtonOptions['id'] )) {
            $this->nextButtonOptions['id'] = "{$this->containerOptions['id']}-swiper-button-next";
        }
        if ( ! isset( $this->nextButtonOptions['class'] ) || empty( $this->nextButtonOptions['class'] )) {
            $this->nextButtonOptions['class'] = 'swiper-button-next';
        } else {
            $this->nextButtonOptions['class'] = implode( " ", [ 'swiper-button-next', $this->nextButtonOptions['class'] ] );
        }

        if ( ! isset( $this->prevButtonOptions['tag'] ) || empty( $this->prevButtonOptions['tag'] )) {
            $this->prevButtonOptions['tag'] = 'div';
        }
        if ( ! isset( $this->prevButtonOptions['id'] ) || empty( $this->prevButtonOptions['id'] )) {
            $this->prevButtonOptions['id'] = "{$this->containerOptions['id']}-swiper-button-prev";
        }
        if ( ! isset( $this->prevButtonOptions['class'] ) || empty( $this->prevButtonOptions['class'] )) {
            $this->prevButtonOptions['class'] = 'swiper-button-prev';
        } else {
            $this->prevButtonOptions['class'] = implode( " ", [ 'swiper-button-prev', $this->prevButtonOptions['class'] ] );
        }


        if ( ! isset( $this->parallaxOptions['tag'] ) || empty( $this->parallaxOptions['tag'] )) {
            $this->parallaxOptions['tag'] = 'div';
        }
        if ( ! isset( $this->parallaxOptions['id'] ) || empty( $this->parallaxOptions['id'] )) {
            $this->parallaxOptions['id'] = "{$this->containerOptions['id']}-parallax";
        }
        if ( ! isset( $this->parallaxOptions['class'] ) || empty( $this->parallaxOptions['class'] )) {
            $this->parallaxOptions['class'] = 'parallax-bg';
        } else {
            $this->parallaxOptions['class'] = implode( " ", [ 'parallax-bg', $this->parallaxOptions['class'] ] );
        }


        if ( ! isset( $this->itemOptions['tag'] ) || empty( $this->itemOptions['tag'] )) {
            $this->itemOptions['tag'] = 'div';
        }
        if ( ! isset( $this->itemOptions['class'] ) || empty( $this->itemOptions['class'] )) {
            $this->itemOptions['class'] = 'swiper-slide';
        } else {
            $this->itemOptions['class'] = implode( " ", [ 'swiper-slide', $this->itemOptions['class'] ] );
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        $contentPieces = [
            $this->renderParallax(),
            $this->renderWrapper(),
            $this->renderPagination(),
            $this->renderScrollbar(),
            $this->renderNextButton(),
            $this->renderPrevButton()
        ];

        $this->setRtl();

        $containerOptions  = $this->containerOptions;
        $containerTag      = ArrayHelper::remove( $containerOptions, 'tag', 'div' );
        $renderedContainer = Html::tag( $containerTag, implode( PHP_EOL, $contentPieces ), $containerOptions );

        $this->registerClientScript();

        return $renderedContainer;
    }

    /**
     * @return string
     */
    protected function renderParallax()
    {
        if (in_array( self::BEHAVIOUR_PARALLAX, $this->behaviours )) {
            $parallaxOptions = $this->parallaxOptions;
            $parallaxTag     = ArrayHelper::remove( $parallaxOptions, 'tag', 'div' );

            ! isset( $parallaxOptions['style'] ) && $parallaxOptions['style'] = '';
            if (isset( $parallaxOptions[self::PARALLAX_BACKGROUND] ) && ! empty( $parallaxOptions[self::PARALLAX_BACKGROUND] )) {

                $parallaxBackground = ArrayHelper::remove( $parallaxOptions, self::PARALLAX_BACKGROUND );

                $parallaxOptions['style'] = implode( ';', array_merge( [ $parallaxOptions['style'] ], [ "background-image:url({$parallaxBackground})" ] ) );
                $parallaxOptions['style'] = str_replace( ';;', ';', $parallaxOptions['style'] );
                $parallaxOptions['style'] = trim( $parallaxOptions['style'], ';' );
            }

            if (isset( $parallaxOptions[self::PARALLAX_TRANSITION] )) {
                $parallaxOptions['data']['swiper-parallax'] = ArrayHelper::remove( $parallaxOptions, self::PARALLAX_TRANSITION );
            }
            if (isset( $parallaxOptions[self::PARALLAX_TRANSITION_X] )) {
                $parallaxOptions['data']['swiper-parallax-x'] = ArrayHelper::remove( $parallaxOptions, self::PARALLAX_TRANSITION_X );
            }
            if (isset( $parallaxOptions[self::PARALLAX_TRANSITION_Y] )) {
                $parallaxOptions['data']['swiper-parallax-y'] = ArrayHelper::remove( $parallaxOptions, self::PARALLAX_TRANSITION_Y );
            }
            if (isset( $parallaxOptions[self::PARALLAX_DURATION] )) {
                $parallaxOptions['data']['swiper-parallax-duration'] = ArrayHelper::remove( $parallaxOptions, self::PARALLAX_DURATION );
            }

            return Html::tag( $parallaxTag, '', $parallaxOptions );
        }

        return '';
    }

    /**
     * @return string
     */
    protected function renderWrapper()
    {
        $normalizedItems = $this->normalizeItems( $this->items );
        $renderedItems   = $this->renderItems( $normalizedItems );

        $wrapperOptions  = $this->wrapperOptions;
        $wrapperTag      = ArrayHelper::remove( $wrapperOptions, 'tag', 'div' );
        $renderedWrapper = Html::tag( $wrapperTag, "\n        $renderedItems\n    ", $wrapperOptions );

        return "\n    $renderedWrapper\n";
    }

    /**
     * @param mixed[] $items
     *
     * @return Slide[]
     */
    protected function normalizeItems( array $items )
    {
        $normalizedItems = [ ];

        foreach ($items as $index => $item) {
            if ($item instanceof Slide) {
                $normalizedItems[] = $item;
            } else {
                $normalizedItems[] = new Slide( $item );
            }
        }

        return $normalizedItems;
    }

    /**
     * @param Slide[] $items
     *
     * @return string
     */
    protected function renderItems( array $items )
    {
        $renderedItems = [ ];
        foreach ($items as $item) {
            $renderedItems[] = $this->renderItem( $item );
        }

        return implode( "\n        ", $renderedItems );
    }

    /**
     * @param Slide $slide
     *
     * @return string
     */
    protected function renderItem( Slide $slide )
    {
        $options = array_merge( $this->itemOptions, $slide->options );
        $tag     = ArrayHelper::remove( $options, 'tag', 'div' );

        return Html::tag( $tag, $slide->content, $options );
    }

    /**
     * @return string
     */
    protected function renderPagination()
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
     * @return string
     */
    protected function renderScrollbar()
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
     * @return string
     */
    protected function renderNextButton()
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
     * @return string
     */
    protected function renderPrevButton()
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
     * @return Swiper
     */
    protected function setRtl()
    {
        if (in_array( self::BEHAVIOUR_RTL, $this->behaviours )) {
            $this->containerOptions["dir"] = 'rtl';
        }

        return $this;
    }

    /**
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
}