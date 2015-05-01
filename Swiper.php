<?php
namespace romkaChev\yii2\swiper;

use yii\base\Widget;

class Swiper extends Widget
{

    const MODE_STRICT_CLIENT_OPTION_ON  = true;
    const MODE_STRICT_CLIENT_OPTION_OFF = true;

    const MODE_DEBUG_ON        = true;
    const MODE_DEBUG_OFF       = true;
    const OPTION_INITIAL_SLIDE = 'initialSlide';
    const OPTION_DIRECTION     = 'direction';

    //<editor-fold desc="swiper options">
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
    public $strictClientOptions = self::MODE_STRICT_CLIENT_OPTION_ON;
    public $debug               = self::MODE_DEBUG_OFF;
    //</editor-fold>
    /**
     * @var array
     */
    public $pluginOptions = [ ];

    public function init()
    {
        $this->initPluginOptions();

        parent::init();
    }

    /**
     * @return Swiper
     */
    protected function initPluginOptions()
    {
        $this->pluginOptions = [
            self::OPTION_INITIAL_SLIDE                    => 0,
            self::OPTION_DIRECTION                        => 'horizontal',
            self::OPTION_SPEED                            => 300,
            self::OPTION_SET_WRAPPER_SIZE                 => false,
            self::OPTION_VIRTUAL_TRANSLATE                => false,
            //self::OPTION_WIDTH                            => null,
            //self::OPTION_HEIGHT                           => null,
            //
            //self::OPTION_AUTOPLAY                         => null,
            self::OPTION_AUTOPLAY_DISABLE_ON_INTERACTION  => true,
            //
            self::OPTION_WATCH_SLIDES_PROGRESS            => false,
            self::OPTION_WATCH_SLIDES_VISIBILITY          => false,
            //
            self::OPTION_FREE_MODE                        => false,
            self::OPTION_FREE_MODE_MOMENTUM               => true,
            self::OPTION_FREE_MODE_MOMENTUM_RATIO         => 1,
            self::OPTION_FREE_MODE_MOMENTUM_BOUNCE        => true,
            self::OPTION_FREE_MODE_MOMENTUM_BOUNCE_RATIO  => 1,
            self::OPTION_FREE_MODE_STICKY                 => false,
            //
            self::OPTION_EFFECT                           => 'slide',
            self::OPTION_FADE                             => [
                self::OPTION_FADE_CROSS_FADE => false,
            ],
            self::OPTION_CUBE                             => [
                self::OPTION_CUBE_SLIDE_SHADOWS => true,
                self::OPTION_CUBE_SHADOW        => true,
                self::OPTION_CUBE_SHADOW_OFFSET => 20,
                self::OPTION_CUBE_SHADOW_SCALE  => 0.94,
            ],
            self::OPTION_COVERFLOW                        => [
                self::OPTION_COVERFLOW_ROTATE        => 50,
                self::OPTION_COVERFLOW_STRETCH       => 0,
                self::OPTION_COVERFLOW_DEPTH         => 100,
                self::OPTION_COVERFLOW_MODIFIER      => 1,
                self::OPTION_COVERFLOW_SLIDE_SHADOWS => true,
            ],
            //
            self::OPTION_PARALLAX                         => false,
            //
            self::OPTION_SPACE_BETWEEN                    => 0,
            self::OPTION_SLIDES_PER_VIEW                  => 1,
            self::OPTION_SLIDES_PER_COLUMN                => 1,
            self::OPTION_SLIDES_PER_COLUMN_FILL           => 'column',
            self::OPTION_SLIDES_PER_GROUP                 => 1,
            self::OPTION_CENTERED_SLIDES                  => false,
            //
            self::OPTION_GRAB_CURSOR                      => false,
            //
            self::OPTION_TOUCH_RATIO                      => 1,
            self::OPTION_TOUCH_ANGLE                      => 45,
            self::OPTION_SIMULATE_TOUCH                   => true,
            self::OPTION_SHORT_SWIPES                     => true,
            self::OPTION_LONG_SWIPES                      => true,
            self::OPTION_LONGS_WIPES_RATIO                => 0.5,
            self::OPTION_LONG_SWIPES_MS                   => 300,
            self::OPTION_FOLLOW_FINGER                    => true,
            self::OPTION_ONLY_EXTERNAL                    => false,
            self::OPTION_THRESHOLD                        => 0,
            self::OPTION_TOUCH_MOVE_STOP_PROPAGATION      => true,
            //
            self::OPTION_RESISTANCE                       => true,
            self::OPTION_RESISTANCE_RATIO                 => 0.85,
            //
            self::OPTION_PREVENT_CLICKS                   => true,
            self::OPTION_PREVENT_CLICKS_PROPAGATION       => true,
            self::OPTION_SLIDE_TO_CLICKED_SLIDE           => false,
            //
            self::OPTION_ALLOW_SWIPE_TO_PREV              => true,
            self::OPTION_ALLOW_SWIPE_TO_NEXT              => true,
            self::OPTION_NO_SWIPING                       => true,
            self::OPTION_NO_SWIPING_CLASS                 => 'swiper-no-swiping',
            self::OPTION_SWIPE_HANDLER                    => null,
            //
            self::OPTION_PAGINATION                       => null,
            self::OPTION_PAGINATION_HIDE                  => true,
            self::OPTION_PAGINATION_CLICKABLE             => false,
            self::OPTION_PAGINATION_BULLET_RENDER         => null,
            //
            self::OPTION_NEXT_BUTTON                      => null,
            self::OPTION_PREV_BUTTON                      => null,
            //
            self::OPTION_A11Y                             => false,
            self::OPTION_PREV_SLIDE_MESSAGE               => 'Previous slide',
            self::OPTION_NEXT_SLIDE_MESSAGE               => 'Next slide',
            self::OPTION_FIRST_SLIDE_MESSAGE              => 'This is the first slide',
            self::OPTION_LAST_SLIDE_MESSAGE               => 'This is the last slide',
            //
            self::OPTION_SCROLLBAR                        => null,
            self::OPTION_SCROLLBAR_HIDE                   => true,
            //
            self::OPTION_KEYBOARD_CONTROL                 => false,
            self::OPTION_MOUSEWHEEL_CONTROL               => false,
            self::OPTION_MOUSEWHEEL_FORCE_TO_AXIS         => false,
            //
            self::OPTION_HASHNAV                          => false,
            //
            self::OPTION_PRELOAD_IMAGES                   => true,
            self::OPTION_UPDATE_ON_IMAGES_READY           => true,
            self::OPTION_LAZY_LOADING                     => false,
            self::OPTION_LAZY_LOADING_IN_PREV_NEXT        => false,
            self::OPTION_LAZY_LOADING_ON_TRANSITION_START => false,
            //
            self::OPTION_LOOP                             => false,
            self::OPTION_LOOP_ADDITIONAL_SLIDES           => 0,
            self::OPTION_LOOPED_SLIDES                    => null,
            //
            //self::OPTION_CONTROL                          => new JsExpression('undefined'),
            self::OPTION_CONTROL_INVERSE                  => false,
            //
            self::OPTION_OBSERVER                         => false,
            self::OPTION_OBSERVE_PARENTS                  => false,
            //
            //self::OPTION_RUN_CALLBACKS_ON_INIT            => true,
            //self::OPTION_ON_INIT                          => new JsExpression( 'function( swiper               ){ console.log("onInit",              swiper               ); }' ),
            //self::OPTION_ON_SLIDE_CHANGE_START            => new JsExpression( 'function( swiper               ){ console.log("onSlideChangeStart",  swiper               ); }' ),
            //self::OPTION_ON_SLIDE_CHANGE_END              => new JsExpression( 'function( swiper               ){ console.log("onSlideChangeEnd",    swiper               ); }' ),
            //self::OPTION_ON_TRANSITION_START              => new JsExpression( 'function( swiper               ){ console.log("onTransitionStart",   swiper               ); }' ),
            //self::OPTION_ON_TRANSITION_END                => new JsExpression( 'function( swiper               ){ console.log("onTransitionEnd",     swiper               ); }' ),
            //self::OPTION_ON_TOUCH_START                   => new JsExpression( 'function( swiper, event        ){ console.log("onTouchStart",        swiper, event        ); }' ),
            //self::OPTION_ON_TOUCH_MOVE                    => new JsExpression( 'function( swiper, event        ){ console.log("onTouchMove",         swiper, event        ); }' ),
            //self::OPTION_ON_TOUCH_MOVE_OPPOSITE           => new JsExpression( 'function( swiper, event        ){ console.log("onTouchMoveOpposite", swiper, event        ); }' ),
            //self::OPTION_ON_SLIDER_MOVE                   => new JsExpression( 'function( swiper, event        ){ console.log("onSliderMove",        swiper, event        ); }' ),
            //self::OPTION_ON_TOUCH_END                     => new JsExpression( 'function( swiper, event        ){ console.log("onTouchEnd",          swiper, event        ); }' ),
            //self::OPTION_ON_CLICK                         => new JsExpression( 'function( swiper, event        ){ console.log("onClick",             swiper, event        ); }' ),
            //self::OPTION_ON_TAP                           => new JsExpression( 'function( swiper, event        ){ console.log("onTap",               swiper, event        ); }' ),
            //self::OPTION_ON_DOUBLE_TAP                    => new JsExpression( 'function( swiper, event        ){ console.log("onDoubleTap",         swiper, event        ); }' ),
            //self::OPTION_ON_IMAGES_READY                  => new JsExpression( 'function( swiper               ){ console.log("onImagesReady",       swiper               ); }' ),
            //self::OPTION_ON_PROGRESS                      => new JsExpression( 'function( swiper, progress     ){ console.log("onProgress",          swiper, progress     ); }' ),
            //self::OPTION_ON_REACH_BEGINNING               => new JsExpression( 'function( swiper               ){ console.log("onReachBeginning",    swiper               ); }' ),
            //self::OPTION_ON_REACH_END                     => new JsExpression( 'function( swiper               ){ console.log("onReachEnd",          swiper               ); }' ),
            //self::OPTION_ON_DESTROY                       => new JsExpression( 'function( swiper               ){ console.log("onDestroy",           swiper               ); }' ),
            //self::OPTION_ON_SET_TRANSLATE                 => new JsExpression( 'function( swiper, translate    ){ console.log("onSetTranslate",      swiper, translate    ); }' ),
            //self::OPTION_ON_SET_TRANSITION                => new JsExpression( 'function( swiper, transition   ){ console.log("onSetTransition",     swiper, transition   ); }' ),
            //self::OPTION_ON_AUTOPLAY_START                => new JsExpression( 'function( swiper               ){ console.log("onAutoplayStart",     swiper               ); }' ),
            //self::OPTION_ON_AUTOPLAY_STOP                 => new JsExpression( 'function( swiper               ){ console.log("onAutoplayStop",      swiper               ); }' ),
            //self::OPTION_ON_LAZY_IMAGE_LOAD               => new JsExpression( 'function( swiper, slide, image ){ console.log("onLazyImageLoad",     swiper, slide, image ); }' ),
            //self::OPTION_ON_LAZY_IMAGE_READY              => new JsExpression( 'function( swiper, slide, image ){ console.log("onLazyImageReady",    swiper, slide, image ); }' ),
            //
            self::OPTION_SLIDE_CLASS                      => 'swiper-slide',
            self::OPTION_SLIDE_ACTIVE_CLASS               => 'swiper-slide-active',
            self::OPTION_SLIDE_VISIBLE_CLASS              => 'swiper-slide-visible',
            self::OPTION_SLIDE_DUPLICATE_CLASS            => 'swiper-slide-duplicate',
            self::OPTION_SLIDE_NEXT_CLASS                 => 'swiper-slide-next',
            self::OPTION_SLIDE_PREV_CLASS                 => 'swiper-slide-prev',
            self::OPTION_WRAPPER_CLASS                    => 'swiper-wrapper',
            self::OPTION_BULLET_CLASS                     => 'swiper-pagination-bullet',
            self::OPTION_BULLET_ACTIVE_CLASS              => 'swiper-pagination-bullet-active',
            self::OPTION_PAGINATION_HIDDEN_CLASS          => 'swiper-pagination-hidden',
            self::OPTION_BUTTON_DISABLED_CLASS            => 'swiper-button-disabled',
        ];
        return $this;
    }

    public function run()
    {

    }

}