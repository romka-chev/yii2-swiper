# Effects

Swiper provides by default 4 types of effects:

* `slide`
* `fade`
* `cube`
* `coverflow`

> Note: effect `slide` is used by default and does not need to be specified or configured.

When configuring the widget, it is important to specify what kind of effect you want to use,
otherwise you simply configure the effect, but widget will apply effect by default - `slide`.

Example:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

/**
 * Wrong.
 * Effect 'fade' won't be applied - 
 * we only configured it.
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
 * Correct.
 * As we pointed the effect, it will be applied
 */
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ]
  ],
  'pluginOptions' => [
    'effect' => 'fade', // Specify the effect to be applied to the slider.
    'fade'   => [
      'crossFade' => true
    ]
  ]
] );
```

### Example of `fade`:

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
    'effect' => 'fade', // Specifying what effect use
    'fade'   => [ // Setting effect
      'crossFade' => true
    ]
  ]
] );

// With named constants
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    Swiper::OPTION_EFFECT => Swiper::EFFECT_FADE, // Specifying what effect use
    Swiper::OPTION_FADE   => [ // Setting effect
      Swiper::OPTION_FADE_CROSS_FADE => true
    ]
  ]
] );

```

### Example of `cube`:

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
    'effect' => 'cube', // Specifying what effect use
    'cube'   => [ // Setting effect
      'slideShadows'  => true,
      'shadow'        => true,
      'shadowOffset'  => 20,
      'shadowScale'   => 0.94
    ]
  ]
] );

// With named constants
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    Swiper::OPTION_EFFECT => Swiper::EFFECT_CUBE, // Specifying what effect use
    Swiper::OPTION_CUBE   => [ // Setting effect
      Swiper::OPTION_CUBE_SLIDE_SHADOWS => true,
      Swiper::OPTION_CUBE_SHADOW        => true,
      Swiper::OPTION_CUBE_SHADOW_OFFSET => 20,
      Swiper::OPTION_CUBE_SHADOW_SCALE  => 0.94
    ]
  ]
] );
```

### Example of `coverflow`:

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
    'effect'    => 'coverflow', // Specifying what effect use
    'coverflow' => [ // Setting effect
      'rotate'        => 50,
      'stretch'       => 0,
      'depth'         => 100,
      'modifier'      => 1,
      'slideShadows'  => true
    ]
  ]
] );

// With named constants
Swiper::widget( [
  'items'         => [
    [ 'background' => 'http://lorempixel.com/600/600/nature/1' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/2' ],
    [ 'background' => 'http://lorempixel.com/600/600/nature/3' ],
  ],
  'pluginOptions' => [
    Swiper::OPTION_EFFECT     => Swiper::EFFECT_COVERFLOW, // Specifying what effect use
    Swiper::OPTION_COVERFLOW  => [ // Setting effect
      Swiper::OPTION_COVERFLOW_ROTATE        => 50,
      Swiper::OPTION_COVERFLOW_STRETCH       => 0,
      Swiper::OPTION_COVERFLOW_DEPTH         => 100,
      Swiper::OPTION_COVERFLOW_MODIFIER      => 1,
      Swiper::OPTION_COVERFLOW_SLIDE_SHADOWS => true
    ]
  ]
] );
```
