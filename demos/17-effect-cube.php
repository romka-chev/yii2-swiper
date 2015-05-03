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
    ],
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'pluginOptions' => [
        Swiper::OPTION_EFFECT      => Swiper::EFFECT_CUBE,
        Swiper::OPTION_GRAB_CURSOR => true,
        Swiper::OPTION_CUBE        => [
            Swiper::OPTION_CUBE_SHADOW        => true,
            Swiper::OPTION_CUBE_SLIDE_SHADOWS => true,
            Swiper::OPTION_CUBE_SHADOW_OFFSET => 20,
            Swiper::OPTION_CUBE_SHADOW_SCALE  => 0.94
        ]
    ]
] );