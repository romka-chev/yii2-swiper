<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'             => [
        'Slide 1',
        'Slide 2',
        'Slide 3',
        'Slide 4',
        'Slide 5',
        'Slide 6',
        'Slide 7',
        'Slide 8',
        'Slide 9',
        'Slide 10',
    ],
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'nextButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'prevButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        'debugger'                          => true
    ]
] );

$this->registerJs( <<<JS
//noinspection ReservedWordAsName
Swiper.prototype.plugins.debugger = function ( swiper, params ) {
    if (! params) {
        return;
    }
    // Need to return object with properties that names are the same as callbacks
    //noinspection JSUnusedLocalSymbols
    return {
        onInit            : function ( swiper ) {
            console.log( 'onInit' );
        },
        onClick           : function ( swiper, e ) {
            console.log( 'onClick' );
        },
        onTap             : function ( swiper, e ) {
            console.log( 'onTap' );
        },
        onDoubleTap       : function ( swiper, e ) {
            console.log( 'onDoubleTap' );
        },
        onSliderMove      : function ( swiper, e ) {
            console.log( 'onSliderMove' );
        },
        onSlideChangeStart: function ( swiper ) {
            console.log( 'onSlideChangeStart' );
        },
        onSlideChangeEnd  : function ( swiper ) {
            console.log( 'onSlideChangeEnd' );
        },
        onTransitionStart : function ( swiper ) {
            console.log( 'onTransitionStart' );
        },
        onTransitionEnd   : function ( swiper ) {
            console.log( 'onTransitionEnd' );
        },
        onReachBeginning  : function ( swiper ) {
            console.log( 'onReachBeginning' );
        },
        onReachEnd        : function ( swiper ) {
            console.log( 'onReachEnd' );
        }
    };
};
JS
    , $this::POS_END );

$this->registerCss( <<<CSS
html, body {
    position : relative;
    height   : 100%;
}

body {
    background  : #eee;
    font-family : Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size   : 14px;
    color       : #000;
    margin      : 0;
    padding     : 0;
}

/*noinspection CssUnusedSymbol*/
.swiper-container {
    width  : 100%;
    height : 100%;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide {
    text-align              : center;
    font-size               : 18px;
    background              : #fff;

    /* Center slide text vertically */
    display                 : -webkit-box;
    display                 : -ms-flexbox;
    display                 : -webkit-flex;
    display                 : flex;
    -webkit-box-pack        : center;
    -ms-flex-pack           : center;
    -webkit-justify-content : center;
    justify-content         : center;
    -webkit-box-align       : center;
    -ms-flex-align          : center;
    -webkit-align-items     : center;
    align-items             : center;
}
CSS
);