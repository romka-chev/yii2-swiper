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
    'pluginOptions' => [
        Swiper::OPTION_PAGINATION           => true,
        Swiper::OPTION_SLIDES_PER_VIEW      => Swiper::SLIDES_PER_VIEW_AUTO,
        Swiper::OPTION_CENTERED_SLIDES      => true,
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 30,
    ]
] );
$this->registerCss( <<<CSS
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
    height : 300px;
    margin : 20px auto;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide {
    text-align              : center;
    font-size               : 18px;
    background              : #fff;
    width                   : 60%;

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
.swiper-slide:nth-child(2n) {
    width : 40%;
}

/*noinspection CssUnusedSymbol*/
.swiper-slide:nth-child(3n) {
    width : 20%;
}
CSS
);