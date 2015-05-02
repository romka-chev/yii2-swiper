<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items' => [
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
    width  : 500px;
    height : 300px;
    margin : 20px auto;
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