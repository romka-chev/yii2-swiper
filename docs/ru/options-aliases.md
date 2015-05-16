# Алиасы

Для работы с классами `\romkaChev\yii2\swiper\Swiper` и `\romkaChev\yii2\swiper\Slide` были приготовлены алиасы
для быстрого и удобного указания наиболее часто используемых опций.

### \romkaChev\yii2\swiper\Swiper

| Алиас         | Константа               | Что заменяет                                                      |
|---------------|-------------------------|-------------------------------------------------------------------|
| `background`  | `PARALLAX_BACKGROUND`   | `Swiper::$parallaxOptions['style'] = 'background-image:url(...)'` |
| `transition`  | `PARALLAX_TRANSITION`   | `Swiper::$parallaxOptions['data']['swiper-parallax']`             |
| `transitionX` | `PARALLAX_TRANSITION_X` | `Swiper::$parallaxOptions['data']['swiper-parallax-x']`           |
| `transitionY` | `PARALLAX_TRANSITION_Y` | `Swiper::$parallaxOptions['data']['swiper-parallax-y']`           |
| `duration`    | `PARALLAX_DURATION`     | `Swiper::$parallaxOptions['data']['swiper-duration']`             |

Пример использования:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

// С помощью алиасов
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

// С помощью констант
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

// Напрямую
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

| Алиас        | Константа    | Что заменяет                                             |
|--------------|--------------|----------------------------------------------------------|
| `background` | `BACKGROUND` | `Slide::$options['style'] = 'background-image:url(...)'` |
| `hash`       | `HASH`       | `Slide::$options['data']['hash']`                        |

Пример использования:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

// С помощью алиасов
$slide = new Slide( [
  'background' => 'http://placehold.it/800x600',
  'hash'       => 'slide01'
] );

// С помощью констант
$slide = new Slide( [
  Slide::BACKGROUND => 'http://placehold.it/800x600',
  Slide::HASH       => 'slide01'
] );

// Напрямую
$slide = new Slide([
  'options' => [
    'style'   => 'background-image:url(http://placehold.it/800x600)',
    'options' => [
      'hash' => 'slide01'
    ]
  ]
]);
```
## Двусторонняя работа с алиасами

Обратите внимание, что алиасы работают **в обе стороны** сразу после создания объекта.

#### Пример настройки через алиасы:

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

#### Пример настройки напрямую:

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
