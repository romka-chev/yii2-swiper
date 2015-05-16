# Эффекты

Swiper предоставляет по-умолчанию 4 вида эффектов:
* `slide`
* `fade`
* `cube`
* `coverflow`

> Примечание: эффект `slide` используется по-умолчанию и его не нужно указывать, либо настраивать.

При настройке виджета важно указать, какой эффект вы хотите использовать, 
иначе вы просто настроите указанный эффект, а применен будет эффект по-умолчанию - `slide`.

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

/**
 * Неправильно.
 * Эффект fade не будет применен к слайдеру - 
 * мы только настроили его.
 */
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ]
  ],
  'pluginOptions' => [
    'fade'   => [
      'crossFade' => true
    ]
  ]
] );

/**
 * Правильно.
 * Так как мы указали эффект, то он будет применен
 */
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ]
  ],
  'pluginOptions' => [
    'effect' => 'fade', // Указываем эффект, который нужно применить к слайдеру.
    'fade'   => [
      'crossFade' => true
    ]
  ]
] );
```

### Пример `fade`:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    'effect' => 'fade', // Указание, какой эффект использовать
    'fade'   => [ // Настройка эффекта
      'crossFade' => true
    ]
  ]
] );

// С именованными константами
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    Swiper::OPTION_EFFECT => Swiper::EFFECT_FADE, // Указание, какой эффект использовать
    Swiper::OPTION_FADE   => [ // Настройка эффекта
      Swiper::OPTION_FADE_CROSS_FADE => true
    ]
  ]
] );

```

### Пример `cube`:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    'effect' => 'cube', // Указание, какой эффект использовать
    'cube'   => [ // Настройка эффекта
      'slideShadows'  => true,
      'shadow'        => true,
      'shadowOffset'  => 20,
      'shadowScale'   => 0.94
    ]
  ]
] );

// С именованными константами
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    Swiper::OPTION_EFFECT => Swiper::EFFECT_CUBE, // Указание, какой эффект использовать
    Swiper::OPTION_CUBE   => [ // Настройка эффекта
      Swiper::OPTION_CUBE_SLIDE_SHADOWS => true,
      Swiper::OPTION_CUBE_SHADOW        => true,
      Swiper::OPTION_CUBE_SHADOW_OFFSET => 20,
      Swiper::OPTION_CUBE_SHADOW_SCALE  => 0.94
    ]
  ]
] );
```

### Пример `coverflow`:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    'effect'    => 'coverflow', // Указание, какой эффект использовать
    'coverflow' => [ // Настройка эффекта
      'rotate'        => 50,
      'stretch'       => 0,
      'depth'         => 100,
      'modifier'      => 1,
      'slideShadows'  => true
    ]
  ]
] );

// С именованными константами
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    Swiper::OPTION_EFFECT     => Swiper::EFFECT_COVERFLOW, // Указание, какой эффект использовать
    Swiper::OPTION_COVERFLOW  => [ // Настройка эффекта
      Swiper::OPTION_COVERFLOW_ROTATE        => 50,
      Swiper::OPTION_COVERFLOW_STRETCH       => 0,
      Swiper::OPTION_COVERFLOW_DEPTH         => 100,
      Swiper::OPTION_COVERFLOW_MODIFIER      => 1,
      Swiper::OPTION_COVERFLOW_SLIDE_SHADOWS => true
    ]
  ]
] );
```
