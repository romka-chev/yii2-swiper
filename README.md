# Yii2-swiper ![Coverage 100%](https://img.shields.io/badge/coverage-100%25-green.svg?style=flat) ![License Apache 2.0](https://img.shields.io/badge/license-Apache%202-blue.svg?style=flat)

Yii2 extension for Swiper slider. See more here: [https://github.com/nolimits4web/Swiper/](https://github.com/nolimits4web/Swiper).

You can find examples in [demos](https://github.com/romka-chev/yii2-swiper/tree/master/demos) folder.

## Installation
 
You can get this extension through [Composer](https://getcomposer.org/download/).
 
Either run in terminal
 
```Shell
$ php composer.phar require "romka-chev/yii2-swiper" "*"
```
 
or add
 
```JSON
"romka-chev/yii2-swiper" : "*"
```
 
to the *require* section of your application's ```composer.json``` file.
    
###Usage

```PHP
 
<?php
/**
 * @var \yii\web\View $this
 */
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
    'items'         => [
        [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/4' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/5' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/6' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/7' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/8' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/9' ],
        [ 'background' => 'http://lorempixel.com/600/600/nature/10' ],
    ],
    'behaviours'    => [
        Swiper::BEHAVIOUR_PAGINATION,
    ],
    'pluginOptions' => [
        Swiper::OPTION_EFFECT          => Swiper::EFFECT_COVERFLOW,
        Swiper::OPTION_GRAB_CURSOR     => true,
        Swiper::OPTION_CENTERED_SLIDES => true,
        Swiper::OPTION_SLIDES_PER_VIEW => Swiper::SLIDES_PER_VIEW_AUTO,
        Swiper::OPTION_COVERFLOW       => [
            Swiper::OPTION_COVERFLOW_ROTATE        => 50,
            Swiper::OPTION_COVERFLOW_STRETCH       => 0,
            Swiper::OPTION_COVERFLOW_DEPTH         => 100,
            Swiper::OPTION_COVERFLOW_MODIFIER      => 1,
            Swiper::OPTION_COVERFLOW_SLIDE_SHADOWS => true
        ]
    ]
] );
 
```

## Issues

If some problems occurred, you can create [issue](https://github.com/romka-chev/yii2-swiper/issues).

Thank you for attention.