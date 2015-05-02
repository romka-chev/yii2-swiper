<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

$galleryTopId    = 'gallery-top';
$galleryThumbsId = 'gallery-thumbs';

echo Swiper::widget( [
    'items'             => [
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/1' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/2' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/3' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/4' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/5' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/6' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/7' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/8' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/9' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/10' ],
    ],
    'behaviours'        => [
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'containerOptions'  => [
        'id'    => $galleryTopId,
        'class' => 'gallery-top'
    ],
    'nextButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'prevButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_SPACE_BETWEEN => 10,
    ]
] );

echo Swiper::widget( [
    'items'            => [
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/1' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/2' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/3' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/4' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/5' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/6' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/7' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/8' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/9' ],
        [ 'background' => 'http://lorempixel.com/1200/1200/nature/10' ],
    ],
    'containerOptions' => [
        'id'    => $galleryThumbsId,
        'class' => 'gallery-thumbs'
    ],
    'pluginOptions'    => [
        Swiper::OPTION_SPACE_BETWEEN          => 10,
        Swiper::OPTION_CENTERED_SLIDES        => true,
        Swiper::OPTION_SLIDES_PER_VIEW        => Swiper::SLIDES_PER_VIEW_AUTO,
        Swiper::OPTION_TOUCH_RATIO            => 0.2,
        Swiper::OPTION_SLIDE_TO_CLICKED_SLIDE => true
    ]
] );

$this->registerJs( <<<JS
//noinspection JSJQueryEfficiency
var galleryTop = jQuery( "#{$galleryTopId}" )[0].swiper;

//noinspection JSJQueryEfficiency
var galleryThumbs = jQuery( "#{$galleryThumbsId}" )[0].swiper;

galleryTop.params.control = galleryThumbs;
galleryThumbs.params.control = galleryTop;

JS
);

$this->registerCss( <<<CSS
html, body {
    position : relative;
    height   : 100%;
}

body {
    background  : #000;
    font-family : Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size   : 14px;
    color       : #000;
    margin      : 0;
    padding     : 0;
}

/*noinspection CssUnusedSymbol*/
.swiper-container {
    width        : 100%;
    height       : 300px;
    margin-left  : auto;
    margin-right : auto;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide {
    background-size     : cover;
    background-position : center;
}

/*noinspection CssUnusedSymbol*/
.gallery-top {
    height : 80%;
    width  : 100%;
}

/*noinspection CssUnusedSymbol*/
.gallery-thumbs {
    height     : 20%;
    box-sizing : border-box;
    padding    : 10px 0;
}

/*noinspection CssUnusedSymbol*/
.gallery-thumbs .swiper-slide {
    width   : 25%;
    height  : 100%;
    opacity : 0.4;
}

/*noinspection CssUnusedSymbol*/
.gallery-thumbs .swiper-slide-active {
    opacity : 1;
}

CSS
);