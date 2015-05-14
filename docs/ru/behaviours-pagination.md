# Пагинация

Для подключения в слайдер пагинации необходимо объявить поведение **pagination** в поле **behaviours**, 
иначе пагинация не будет отрендерена.

> Заметьте: чтобы пагинация была кликабельной, необходимо указать **paginationClickable** = true 
  в поле **pluginOptions**

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
  'pluginOptions' => [
    'paginationClickable' => true
  ]
] );
```

## Настройка пагинации

Настройка управляющего тега пагинации происходит через поле **paginationOptions**. Настройка аналогична **\yii\helpers\BaseHtml::tag**

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

