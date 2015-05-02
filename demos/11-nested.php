<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
        'Horizontal Slide 1',
        Swiper::widget( [
            'items'         => [
                'Vertical Slide 1',
                'Vertical Slide 2',
                'Vertical Slide 3',
                'Vertical Slide 4',
                'Vertical Slide 5',
            ],
            'pluginOptions' => [
                Swiper::OPTION_PAGINATION           => true,
                Swiper::OPTION_PAGINATION_CLICKABLE => true,
                Swiper::OPTION_DIRECTION            => Swiper::DIRECTION_VERTICAL,
                Swiper::OPTION_SPACE_BETWEEN        => 50,
            ]
        ] ),
        'Horizontal Slide 3',
        'Horizontal Slide 4',
    ],
    'pluginOptions' => [
        Swiper::OPTION_PAGINATION           => true,
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 50,
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
.swiper-container-v {
    background : #eee;
}
CSS
);