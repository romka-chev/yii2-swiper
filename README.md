# Yii2-swiper ![Coverage 100%](https://img.shields.io/badge/coverage-100%25-green.svg?style=flat) ![License MIT](https://img.shields.io/badge/License-MIT-blue.svg?style=flat)

Yii2 extension for Swiper slider. See more here: [https://github.com/nolimits4web/Swiper/](https://github.com/nolimits4web/Swiper).

You can find examples in [demos](demos) folder.

Also you can read [documentation](docs).

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

If some problems occurred, you can create [issue](issues).

Thank you for attention.
