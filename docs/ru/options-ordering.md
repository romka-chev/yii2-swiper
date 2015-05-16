# Конфликты алиасов и прямых опций

Если одновременно заданы и слайд и прямая настройка, то будет принят алиас, так как у него больший приоритет.

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'       => [
    [
      'content' => 'Slide 1',
      'hash'    => 'alias-hash',  // Будет применено это значение
      'options' => [
        'data' => [
          'hash' => 'direct-hash'
        ]
      ]
    ]
  ],
  'parallaxOptions' => [
    'duration' => 750, // Будет применено это значение
    'data' => [
      'swiper-duration' => 2000
    ]
  ]
] );
```

## Настройка фона

При настройке фона, он будет добавлен в конец секции `style` html-настроек тега.

|Алиас                        |Куда будет добавлен                |
|-----------------------------|-----------------------------------|
|`Slide::BACKGROUND`          |`Slide::$options['style']`         |
|`Swiper::PARALLAX_BACKGROUND`|`Swiper::$parallaxOptions['style']`|

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'content'    => 'Slide 01',
  'background' => 'http://placehold.it/500x300',
  'options'    => [
    'style' => 'color:#fff'
  ]
]);

echo $slide->options['style']; // color:#fff; background-image(http://placehold.it/500x300)
```

---

Также следует учитывать то, что при задании фона прямо в настройках `style`, 
алиас будет добавлен в конец секции `style`.

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'content'    => 'Slide 01',
  'background' => 'http://placehold.it/500x300',
  'options'    => [
    'style' => 'background-image(http://placehold.it/1000x1000)'
  ]
]);

echo $slide->options['style']; 
// background-image(http://placehold.it/1000x1000); background-image(http://placehold.it/500x300)
```
