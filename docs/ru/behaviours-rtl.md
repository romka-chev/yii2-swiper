# Отображение справа налево

Для отображения контента справа налево необходимо объявить 
поведение rtl в поле behaviours, иначе поведение не будет применено.

Данное поведение всего лишь добавляет опцию `'dir' = 'rtl'` в тег-контейнер виджета.

> Заметка: Аналогичный эффект будет, если указать `containerOptions['dir'] = 'rtl'`

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items' => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours' => [
    'rtl'
  ]
] );

// Через именованную константу
echo Swiper::widget( [
  'items' => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours' => [
    Swiper::BEHAVIOUR_RTL
  ]
] );

// Через настройки контейнера
echo Swiper::widget( [
  'items' => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'containerOptions' => [
    'dir' => 'rtl'
  ]
] );
```
