<?php
/**
 * @var \yii\web\View $this
 */

use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;
use yii\web\JsExpression;

echo Swiper::widget( [
    'items'             => [
        [
            'content' => Swiper::widget( [
                'items'           => [
                    //@formatter:off
                    [
                        'content' => [
                            Html::tag( 'div', 'Slide 1',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                            Html::tag( 'div', 'Subtitle 1',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                            Html::tag( 'div', '<p>Text 1</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
                        ],
                        'hash'    => 'slide01-01'
                    ],
                    [
                        'content' => [
                            Html::tag( 'div', 'Slide 2',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                            Html::tag( 'div', 'Subtitle 2',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                            Html::tag( 'div', '<p>Text 2</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
                        ],
                        'hash'    => 'slide01-02'
                    ],
                    [
                        'content' => [
                            Html::tag( 'div', 'Slide 3',       [ 'class' => 'title',    'data' => [ 'swiper-parallax' => - 100 ] ] ),
                            Html::tag( 'div', 'Subtitle 3',    [ 'class' => 'subtitle', 'data' => [ 'swiper-parallax' => - 200 ] ] ),
                            Html::tag( 'div', '<p>Text 3</p>', [ 'class' => 'text',     'data' => [ 'swiper-parallax' => - 300 ] ] ),
                        ],
                        'hash'    => 'slide01-03'
                    ],
                    //@formatter:on
                ],
                'behaviours'      => [
                    Swiper::BEHAVIOUR_PARALLAX,
                ],
                'parallaxOptions' => [
                    Swiper::PARALLAX_BACKGROUND   => 'http://lorempixel.com/1920/1080/nature/1/',
                    Swiper::PARALLAX_TRANSITION_X => '-23%',
                    Swiper::PARALLAX_DURATION     => 500,
                    'class'                       => 'my-parallax-class'
                ],
                'pluginOptions'   => [
                    Swiper::OPTION_HASHNAV          => true,
                    Swiper::OPTION_PARALLAX         => true,
                    Swiper::OPTION_KEYBOARD_CONTROL => true,
                    Swiper::OPTION_DIRECTION        => Swiper::DIRECTION_VERTICAL
                ]
            ] ),
            'hash'    => 'slide01'
        ],
        [
            'content' => Swiper::widget( [
                'items'             => [
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
                'behaviours'        => [
                    Swiper::BEHAVIOUR_PARALLAX,
                    Swiper::BEHAVIOUR_RTL
                ],
                'parallaxOptions'   => [
                    Swiper::PARALLAX_BACKGROUND   => 'http://lorempixel.com/1920/1080/nature/2/',
                    Swiper::PARALLAX_TRANSITION_Y => '-23%',
                    Swiper::PARALLAX_DURATION     => 450
                ],
                'paginationOptions' => [
                    'class' => 'swiper-pagination-white'
                ],
                'pluginOptions'     => [
                    Swiper::OPTION_PAGINATION_CLICKABLE => true,
                    Swiper::OPTION_PARALLAX             => true,
                    Swiper::OPTION_KEYBOARD_CONTROL     => true
                ]
            ] ),
            'hash'    => 'slide02'
        ],
        [
            'content' => Swiper::widget( [
                'items'             => [
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
                'behaviours'        => [
                    Swiper::BEHAVIOUR_PARALLAX,
                ],
                'parallaxOptions'   => [
                    Swiper::PARALLAX_BACKGROUND => 'http://lorempixel.com/1920/1080/nature/3/',
                    Swiper::PARALLAX_TRANSITION => '-23%',
                    Swiper::PARALLAX_DURATION   => 350
                ],
                'paginationOptions' => [
                    'class' => 'swiper-pagination-white'
                ],
                'pluginOptions'     => [
                    Swiper::OPTION_PAGINATION_CLICKABLE => true,
                    Swiper::OPTION_PARALLAX             => true,
                    Swiper::OPTION_KEYBOARD_CONTROL     => true
                ]
            ] ),
            'hash'    => 'slide03'
        ]
    ],
    'behaviours'        => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON,
    ],
    'nextButtonOptions' => [
        'class' => 'swiper-button-white'
    ],
    'paginationOptions' => [
        'class' => 'swiper-pagination-white'
    ],
    'wrapperOptions'    => [
        'class' => 'my-wrapper-class'
    ],
    'pluginOptions'     => [
        Swiper::OPTION_LOOP                   => true,
        Swiper::OPTION_HASHNAV                => true,
        Swiper::OPTION_PAGINATION_CLICKABLE   => true,
        Swiper::OPTION_SPACE_BETWEEN          => 50,
        Swiper::OPTION_ON_INIT                => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_INIT")}' ),
        Swiper::OPTION_ON_SLIDE_CHANGE_START  => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_SLIDE_CHANGE_START")}' ),
        Swiper::OPTION_ON_SLIDE_CHANGE_END    => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_SLIDE_CHANGE_END")}' ),
        Swiper::OPTION_ON_TRANSITION_START    => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TRANSITION_START")}' ),
        Swiper::OPTION_ON_TRANSITION_END      => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TRANSITION_END")}' ),
        Swiper::OPTION_ON_TOUCH_START         => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TOUCH_START")}' ),
        Swiper::OPTION_ON_TOUCH_MOVE          => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TOUCH_MOVE")}' ),
        Swiper::OPTION_ON_TOUCH_MOVE_OPPOSITE => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TOUCH_MOVE_OPPOSITE")}' ),
        Swiper::OPTION_ON_SLIDER_MOVE         => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_SLIDER_MOVE")}' ),
        Swiper::OPTION_ON_TOUCH_END           => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TOUCH_END")}' ),
        Swiper::OPTION_ON_CLICK               => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_CLICK")}' ),
        Swiper::OPTION_ON_TAP                 => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_TAP")}' ),
        Swiper::OPTION_ON_DOUBLE_TAP          => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_DOUBLE_TAP")}' ),
        Swiper::OPTION_ON_IMAGES_READY        => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_IMAGES_READY")}' ),
        Swiper::OPTION_ON_PROGRESS            => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_PROGRESS")}' ),
        Swiper::OPTION_ON_REACH_BEGINNING     => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_REACH_BEGINNING")}' ),
        Swiper::OPTION_ON_REACH_END           => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_REACH_END")}' ),
        Swiper::OPTION_ON_DESTROY             => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_DESTROY")}' ),
        Swiper::OPTION_ON_SET_TRANSLATE       => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_SET_TRANSLATE")}' ),
        Swiper::OPTION_ON_SET_TRANSITION      => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_SET_TRANSITION")}' ),
        Swiper::OPTION_ON_AUTOPLAY_START      => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_AUTOPLAY_START")}' ),
        Swiper::OPTION_ON_AUTOPLAY_STOP       => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_AUTOPLAY_STOP")}' ),
        Swiper::OPTION_ON_LAZY_IMAGE_LOAD     => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_LAZY_IMAGE_LOAD")}' ),
        Swiper::OPTION_ON_LAZY_IMAGE_READY    => new JsExpression( 'function(){console.log("Swiper::OPTION_ON_LAZY_IMAGE_READY")}' ),
    ]
] );