<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

echo Swiper::widget( [
    'items'           => [
        //@formatter:off
        [
            'content' => [
                Html::tag( 'div', 'Slide 1',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                Html::tag( 'div', 'Subtitle 1',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                Html::tag( 'div', '<p>Text 1</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
            ]
        ],
        [
            'content' => [
                Html::tag( 'div', 'Slide 2',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                Html::tag( 'div', 'Subtitle 2',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                Html::tag( 'div', '<p>Text 2</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
            ]
        ],
        [
            'content' => [
                Html::tag( 'div', 'Slide 3',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                Html::tag( 'div', 'Subtitle 3',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                Html::tag( 'div', '<p>Text 3</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
            ]
        ],
        //@formatter:on
    ],
    'behaviours'      => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON,
        Swiper::BEHAVIOUR_PARALLAX,
    ],
    'parallaxOptions' => [
        Swiper::PARALLAX_BACKGROUND => 'http://lorempixel.com/900/600/nightlife/2/',
        Swiper::PARALLAX_TRANSITION => '-23%'
    ],
    'paginationOptions' => [
        'class' => 'swiper-pagination-white'
    ],
    'pluginOptions'   => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_PARALLAX             => true
    ]
] );