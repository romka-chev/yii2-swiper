<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
        [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/4' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/5' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/6' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/7' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/8' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/9' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/10' ],
    ],
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'pluginOptions' => [
        Swiper::OPTION_EFFECT          => Swiper::EFFECT_COVERFLOW,
        Swiper::OPTION_GRAB_CURSOR     => true,
        Swiper::OPTION_CENTERED_SLIDES => true,
        Swiper::OPTION_SLIDES_PER_VIEW => Swiper::SLIDES_PER_VIEW_AUTO,
        Swiper::OPTION_COVERFLOW       => [
            Swiper::OPTION_COVERFLOW_ROTATE        => 50,
            Swiper::OPTION_COVERFLOW_STRETCH       => 0,
            Swiper::OPTION_COVERFLOW_DEPTH         => 100,
            Swiper::OPTION_COVERFLOW_MODIFIER      => 1,
            Swiper::OPTION_COVERFLOW_SLIDE_SHADOWS => true
        ]
    ]
] );