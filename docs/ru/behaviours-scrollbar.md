# Скроллбар

Для подключения в слайдер скроллбара необходимо объявить поведение `scrollbar` в поле `\romkaChev\yii2\swiper\Swiper::$behaviours`, иначе скроллбар не будет отрендерен.

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
    'scrollbar' // Объявление скроллбара
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
    Swiper::BEHAVIOUR_SCROLLBAR // Объявление скроллбара
  ]
] );
```

## Настройка скроллбара

Настройка управляющего тега скроллбара происходит через поле `\romkaChev\yii2\swiper\Swiper::$scrollbarOptions`. 
Настройка аналогична `\yii\helpers\BaseHtml::tag`

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
    'scrollbar' // Объявление скроллбара
  ],
  'scrollbarOptions'    => [
    'tag'   => 'span',
    'id'    => 'my-scrollbar-id',
    'class' => 'my-scrollbar-class',
    'data'  => [
      'id' => 'my-scrollbar-data-id'
    ]
  ],
  'pluginOptions' => [
    'scrollbarHide' => false
  ]
] );
```
