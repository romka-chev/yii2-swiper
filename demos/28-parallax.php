<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

echo Swiper::widget( [
    'items'           => [
        //@formatter:off
        [
            'content' => [
                Html::tag( 'div', 'Slide 1',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                Html::tag( 'div', 'Subtitle 1',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                Html::tag( 'div', '<p>Text 1</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
            ]
        ],
        [
            'content' => [
                Html::tag( 'div', 'Slide 2',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                Html::tag( 'div', 'Subtitle 2',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                Html::tag( 'div', '<p>Text 2</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
            ]
        ],
        [
            'content' => [
                Html::tag( 'div', 'Slide 3',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                Html::tag( 'div', 'Subtitle 3',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                Html::tag( 'div', '<p>Text 3</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
            ]
        ],
        //@formatter:on
    ],
    'behaviours'      => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON,
    ],
    'parallaxOptions' => [
        Swiper::PARALLAX_BACKGROUND => 'http://lorempixel.com/900/600/nightlife/2/',
        Swiper::PARALLAX_TRANSITION => '-23%'
    ],
    'pluginOptions'   => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_PARALLAX             => true
    ]
] );

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
    width      : 100%;
    height     : 100%;
    background : #000;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide {
    font-size          : 18px;
    color              : #fff;
    -webkit-box-sizing : border-box;
    box-sizing         : border-box;
    padding            : 40px 60px;
}

/*noinspection CssUnusedSymbol*/
.parallax-bg {
    position                : absolute;
    left                    : 0;
    top                     : 0;
    width                   : 130%;
    height                  : 100%;
    -webkit-background-size : cover;
    background-size         : cover;
    background-position     : center;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide .title {
    font-size   : 41px;
    font-weight : 300;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide .subtitle {
    font-size : 21px;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide .text {
    font-size   : 14px;
    max-width   : 400px;
    line-height : 1.3;
}

CSS
);