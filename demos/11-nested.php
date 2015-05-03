<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
        'Horizontal Slide 1',
        Swiper::widget( [
            'items'         => [
                'Vertical Slide 1',
                'Vertical Slide 2',
                'Vertical Slide 3',
                'Vertical Slide 4',
                'Vertical Slide 5',
            ],
            'behaviours' => [
                Swiper::BEHAVIOUR_PAGINATION
            ],
            'pluginOptions' => [
                Swiper::OPTION_PAGINATION_CLICKABLE => true,
                Swiper::OPTION_DIRECTION            => Swiper::DIRECTION_VERTICAL,
                Swiper::OPTION_SPACE_BETWEEN        => 50,
            ]
        ] ),
        'Horizontal Slide 3',
        'Horizontal Slide 4',
    ],
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION
    ],
    'pluginOptions' => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 50,
    ]
] );