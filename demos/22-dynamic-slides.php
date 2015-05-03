<?php
/**
 * @var \yii\web\View $this
 */

use romkaChev\yii2\swiper\Swiper;

$swiperId = "my-swiper-id";

echo Swiper::widget( [
    'items'            => [
        'Slide 1',
        'Slide 2',
        'Slide 3',
        'Slide 4',
    ],
    'behaviours'       => [
        Swiper::BEHAVIOUR_PAGINATION,
        Swiper::BEHAVIOUR_NEXT_BUTTON,
        Swiper::BEHAVIOUR_PREV_BUTTON
    ],
    'containerOptions' => [
        'id' => $swiperId
    ],
    'pluginOptions'    => [
        Swiper::OPTION_PAGINATION_CLICKABLE            => true,
        Swiper::OPTION_SPACE_BETWEEN                   => 30,
        Swiper::OPTION_CENTERED_SLIDES                 => true,
        Swiper::OPTION_AUTOPLAY                        => 2500,
        Swiper::OPTION_AUTOPLAY_DISABLE_ON_INTERACTION => false
    ]
] );
?>

    <p class = "append-buttons">
        <a href = "#" class = "prepend-2-slides">Prepend 2 Slides</a>
        <a href = "#" class = "prepend-slide">Prepend Slide</a>
        <a href = "#" class = "append-slide">Append Slide</a>
        <a href = "#" class = "append-2-slides">Append 2 Slides</a>
    </p>

<?php

$this->registerJs( <<<JS
var appendNumber = 4;
var prependNumber = 1;

var swiper = jQuery('#{$swiperId}')[0].swiper;

document.querySelector( '.prepend-2-slides' ).addEventListener( 'click', function ( e ) {
    e.preventDefault();
    swiper.prependSlide( [
        '<div class="swiper-slide">Slide ' + (-- prependNumber) + '</div>', '<div class="swiper-slide">Slide ' + (-- prependNumber) + '</div>'
    ] );
} );
document.querySelector( '.prepend-slide' ).addEventListener( 'click', function ( e ) {
    e.preventDefault();
    swiper.prependSlide( '<div class="swiper-slide">Slide ' + (-- prependNumber) + '</div>' );
} );
document.querySelector( '.append-slide' ).addEventListener( 'click', function ( e ) {
    e.preventDefault();
    swiper.appendSlide( '<div class="swiper-slide">Slide ' + (++ appendNumber) + '</div>' );
} );
document.querySelector( '.append-2-slides' ).addEventListener( 'click', function ( e ) {
    e.preventDefault();
    swiper.appendSlide( [
        '<div class="swiper-slide">Slide ' + (++ appendNumber) + '</div>', '<div class="swiper-slide">Slide ' + (++ appendNumber) + '</div>'
    ] );
} );
JS
);