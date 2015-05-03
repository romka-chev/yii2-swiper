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