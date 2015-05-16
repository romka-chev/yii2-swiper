# Aliases

For work with classes `\romkaChev\yii2\swiper\Swiper` and `\romkaChev\yii2\swiper\Slide` were introduced aliases
for quick and easy work.

### \romkaChev\yii2\swiper\Swiper

| Alias         | Constant                | What replaces                                                     |
|---------------|-------------------------|-------------------------------------------------------------------|
| `background`  | `PARALLAX_BACKGROUND`   | `Swiper::$parallaxOptions['style'] = 'background-image:url(...)'` |
| `transition`  | `PARALLAX_TRANSITION`   | `Swiper::$parallaxOptions['data']['swiper-parallax']`             |
| `transitionX` | `PARALLAX_TRANSITION_X` | `Swiper::$parallaxOptions['data']['swiper-parallax-x']`           |
| `transitionY` | `PARALLAX_TRANSITION_Y` | `Swiper::$parallaxOptions['data']['swiper-parallax-y']`           |
| `duration`    | `PARALLAX_DURATION`     | `Swiper::$parallaxOptions['data']['swiper-duration']`             |

Example of usage:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'       => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'parallaxOptions' => [
    'background'  => 'http://placehold.it/800x600',
    'transition'  => '-23%',
    'transitionX' => '-10%',
    'transitionY' => '-5%',
    'duration'    => 750
  ]
] );

// With named constants
echo Swiper::widget( [
  'items'       => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'parallaxOptions' => [
    Swiper::PARALLAX_BACKGROUND   => 'http://placehold.it/800x600',
    Swiper::PARALLAX_TRANSITION   => '-23%',
    Swiper::PARALLAX_TRANSITION_X => '-10%',
    Swiper::PARALLAX_TRANSITION_Y => '-5%',
    Swiper::PARALLAX_DURATION     => 750
  ]
] );

// Directly
echo Swiper::widget( [
  'items'       => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'parallaxOptions' => [
    'style' => 'background-image:url(http://placehold.it/800x600)',
    'data' => [
      'swiper-parallax'   => '-23%',
      'swiper-parallax-x' => '-10%',
      'swiper-parallax-y' => '-5%',
      'swiper-duration'   => 750
    ]
  ]
] );
```

### \romkaChev\yii2\swiper\Slide

| Alias        | Constant     | What replaces                                            |
|--------------|--------------|----------------------------------------------------------|
| `background` | `BACKGROUND` | `Slide::$options['style'] = 'background-image:url(...)'` |
| `hash`       | `HASH`       | `Slide::$options['data']['hash']`                        |

Example of usage:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

$slide = new Slide( [
  'background' => 'http://placehold.it/800x600',
  'hash'       => 'slide01'
] );

// With named constants
$slide = new Slide( [
  Slide::BACKGROUND => 'http://placehold.it/800x600',
  Slide::HASH       => 'slide01'
] );

// Directly
$slide = new Slide([
  'options' => [
    'style'   => 'background-image:url(http://placehold.it/800x600)',
    'options' => [
      'hash' => 'slide01'
    ]
  ]
]);
```
## Bilateral work with aliases

Note that aliases operate in **both directions** immediately after the creation of the object.

#### Example configuration through aliases:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'background' => 'http://placehold.it/800x600',
  'hash'       => 'slide01'
]);

echo $slide->background; // http://placehold.it/800x600
echo $slide->hash;       // slide01

echo $slide->options['style'];        // background-image:url(http://placehold.it/800x600)
echo $slide->options['data']['hash']; // slide01

```

#### Example configuration directly:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'options' => [
    'style'   => 'background-image:url(http://placehold.it/800x600)',
    'options' => [
      'hash' => 'slide01'
    ]
  ]
]);

echo $slide->background; // http://placehold.it/800x600
echo $slide->hash;       // slide01

echo $slide->options['style'];        // background-image:url(http://placehold.it/800x600)
echo $slide->options['data']['hash']; // slide01

```
