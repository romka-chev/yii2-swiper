<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
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
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'pluginOptions' => [
        Swiper::OPTION_PAGINATION_CLICKABLE     => true,
        Swiper::OPTION_PAGINATION_BULLET_RENDER => new \yii\web\JsExpression( <<<JS
(function ( index, className ) {
    return '<span class="' + className + '">' + (index + 1) + '</span>';
})
JS
        )
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

/*noinspection CssUnusedSymbol*/
.swiper-pagination-bullet {
    width       : 20px;
    height      : 20px;
    text-align  : center;
    line-height : 20px;
    font-size   : 12px;
    color       : #000;
    opacity     : 1;
    background  : rgba(0, 0, 0, 0.2);
}

/*noinspection CssUnusedSymbol*/
.swiper-pagination-bullet-active {
    color      : #fff;
    background : #007aff;
}
CSS
);