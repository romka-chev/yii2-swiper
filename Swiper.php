<?php
namespace romkaChev\yii2\swiper;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Swiper extends Widget
{

    //<editor-fold desc="swiper options">

    const DIRECTION_HORIZONTAL = 'horizontal';
    const DIRECTION_VERTICAL   = 'vertical';

    const EFFECT_SLIDE     = 'slide';
    const EFFECT_FADE      = 'fade';
    const EFFECT_COVERFLOW = 'coverflow';

    const SLIDES_PER_COLUMN_FILL_COLUMN = 'column';
    const SLIDES_PER_COLUMN_FILL_ROW    = 'row';

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

    /**
     * @var mixed[]
     */
    public $items = [ ];

    /**
     * @var mixed[]
     */
    public $itemOptions = [ ];

    /**
     * @var mixed[]
     */
    public $pluginOptions = [ ];

    public function run()
    {
        $normalizedItems = $this->normalizeItems( $this->items );
        $renderedItems   = $this->renderItems( $normalizedItems );

        return $renderedItems;
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

        return implode( "\n", $renderedItems );
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
}