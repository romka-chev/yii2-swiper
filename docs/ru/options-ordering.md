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

При настройке фона, он будет добавлен в секцию `style`

|Алиас|Куда будет добавлен|
|-----|-------------|
|`Slide::BACKGROUND`|`Slide::$options['style']`|
|`Swiper::PARALLAX_BACKGROUND`|`Swiper::$parallaxOptions['style']`|
