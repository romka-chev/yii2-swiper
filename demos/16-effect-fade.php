<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'             => [
        [ 'background' => 'http://lorempixel.com/1000/1000/nightlife/1' ],
        [ 'background' => 'http://lorempixel.com/1000/1000/nightlife/2' ],
        [ 'background' => 'http://lorempixel.com/1000/1000/nightlife/3' ],
        [ 'background' => 'http://lorempixel.com/1000/1000/nightlife/4' ],
        [ 'background' => 'http://lorempixel.com/1000/1000/nightlife/5' ],
    ],
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'paginationOptions' => [ 'class' => 'swiper-pagination-white' ],
    'nextButtonOptions' => [ 'class' => 'swiper-button-white' ],
    'prevButtonOptions' => [ 'class' => 'swiper-button-white' ],
    'pluginOptions'     => [
        Swiper::OPTION_SPACE_BETWEEN => 30,
        Swiper::OPTION_EFFECT        => Swiper::EFFECT_FADE
    ]
] );