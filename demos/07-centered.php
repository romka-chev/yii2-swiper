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
    'behaviours' => [
        Swiper::BEHAVIOUR_PAGINATION
    ],
    'pluginOptions' => [
        Swiper::OPTION_PAGINATION_CLICKABLE => true,
        Swiper::OPTION_SPACE_BETWEEN        => 30,
        Swiper::OPTION_SLIDES_PER_VIEW      => 4,
        Swiper::OPTION_CENTERED_SLIDES      => true
    ]
] );