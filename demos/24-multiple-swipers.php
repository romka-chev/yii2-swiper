<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'             => [
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
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'containerOptions'  => [
        'class' => 'swiper1'
    ],
    'paginationOptions' => [
        'class' => 'swiper-pagination1'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 30,
    ]
] );

echo Swiper::widget( [
    'items'             => [
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
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'containerOptions'  => [
        'class' => 'swiper2'
    ],
    'paginationOptions' => [
        'class' => 'swiper-pagination2'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 30,
    ]
] );

echo Swiper::widget( [
    'items'             => [
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
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'containerOptions'  => [
        'class' => 'swiper3'
    ],
    'paginationOptions' => [
        'class' => 'swiper-pagination3'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 30,
    ]
] );