# Пагинация

Для подключения в слайдер пагинации необходимо объявить поведение `pagination` в поле `\romkaChev\yii2\swiper\Swiper::$behaviours`, иначе пагинация не будет отрендерена.

> Заметьте: чтобы пагинация была кликабельной, необходимо указать `paginationClickable = true` 
  в поле `\romkaChev\yii2\swiper\Swiper::$pluginOptions`

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'         => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours'    => [
    'pagination' // Объявление пагинации
  ],
  'pluginOptions' => [
    'paginationClickable' => true
  ]
] );

// С именованными константами
echo Swiper::widget( [
  'items'         => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours'    => [
    Swiper::BEHAVIOUR_PAGINATION // Объявление пагинации
  ],
  'pluginOptions' => [
    Swiper::OPTION_PAGINATION_CLICKABLE => true
  ]
] );
```

## Настройка пагинации

Настройка пагинации происходит через поле `\romkaChev\yii2\swiper\Swiper::$paginationOptions`. Настройка аналогична `\yii\helpers\BaseHtml::tag`

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'         => [
    'Slide 1',
    'Slide 2',
    'Slide 3',
    'Slide 4',
    'Slide 5'
  ],
  'behaviours'    => [
    'pagination' // Объявление пагинации
  ],
  'paginationOptions'    => [
    'tag'   => 'span',
    'id'    => 'my-pagination-id',
    'class' => 'my-pagination-class',
    'data'  => [
      'id' => 'my-pagination-data-id'
    ]
  ],
  'pluginOptions' => [
    'paginationClickable' => true
  ]
] );
```

