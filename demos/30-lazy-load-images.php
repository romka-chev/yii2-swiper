<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

echo Swiper::widget( [
    'items'             => [
        [
            'content' => [
                Html::tag( 'img', '', [ 'class' => 'swiper-lazy', 'data' => [ 'src' => 'http://lorempixel.com/1600/1200/nature/1' ] ] ),
                Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
            ]
        ],
        [
            'content' => [
                Html::tag( 'img', '', [ 'class' => 'swiper-lazy', 'data' => [ 'src' => 'http://lorempixel.com/1600/1200/nature/2' ] ] ),
                Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
            ]
        ],
        [
            'content' => [
                Html::tag( 'img', '', [ 'class' => 'swiper-lazy', 'data' => [ 'src' => 'http://lorempixel.com/1600/1200/nature/3' ] ] ),
                Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
            ]
        ],
        [
            'content' => [
                Html::tag( 'img', '', [ 'class' => 'swiper-lazy', 'data' => [ 'src' => 'http://lorempixel.com/1600/1200/nature/4' ] ] ),
                Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
            ]
        ],
        [
            'content' => [
                Html::tag( 'img', '', [ 'class' => 'swiper-lazy', 'data' => [ 'src' => 'http://lorempixel.com/1600/1200/nature/5' ] ] ),
                Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
            ]
        ],
        [
            'content' => [
                Html::tag( 'img', '', [ 'class' => 'swiper-lazy', 'data' => [ 'src' => 'http://lorempixel.com/1600/1200/nature/6' ] ] ),
                Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
            ]
        ],
    ],
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'nextButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'prevButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_PRELOAD_IMAGES       => false,
        Swiper::OPTION_LAZY_LOADING         => true
    ]
] );