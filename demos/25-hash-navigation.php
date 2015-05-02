<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
        [ 'content' => 'Slide 01', 'hash' => 'slide01' ],
        [ 'content' => 'Slide 02', 'hash' => 'slide02' ],
        [ 'content' => 'Slide 03', 'hash' => 'slide03' ],
        [ 'content' => 'Slide 04', 'hash' => 'slide04' ],
        [ 'content' => 'Slide 05', 'hash' => 'slide05' ],
        [ 'content' => 'Slide 06', 'hash' => 'slide06' ],
        [ 'content' => 'Slide 07', 'hash' => 'slide07' ],
        [ 'content' => 'Slide 08', 'hash' => 'slide08' ],
        [ 'content' => 'Slide 09', 'hash' => 'slide09' ],
        [ 'content' => 'Slide 10', 'hash' => 'slide10' ],
    ],
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'pluginOptions' => [
        Swiper::OPTION_SPACE_BETWEEN => 30,
        Swiper::OPTION_HASHNAV       => true
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