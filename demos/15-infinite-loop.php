<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
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
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'pluginOptions' => [
        Swiper::OPTION_SLIDES_PER_VIEW      => 1,
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 30,
        Swiper::OPTION_LOOP                 => true
    ]
] );