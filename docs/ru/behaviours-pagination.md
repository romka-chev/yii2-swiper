# Пагинация

Для подключения в слайдер пагинации, необходимо обявить поведение **pagination** в поле **behaviours**.

> Заметьте: чтобы пагинация была кликабельной, необходимо в настройках пагинации указать **paginationClickable** = true 

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
