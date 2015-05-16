# Кнопки "предыдущий" и "следующий"

Для того, чтобы подключить эти кнопки, необходимо объявить поведения `prevButton` и `nextButton` в поле `\romkaChev\yii2\swiper\Swiper::$behaviours`, 
иначе кнопки не будут отрендерены.

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'      => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours' => [
    'prevButton',
    'nextButton'
  ]
] );

// С именованными константами
echo Swiper::widget( [
  'items'      => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours' => [
    Swiper::BEHAVIOUR_PREV_BUTTON,
    Swiper::BEHAVIOUR_NEXT_BUTTON
  ]
] );
```

## Настройка кнопок

Настройка кнопок происходит через поле `\romkaChev\yii2\swiper\Swiper::$prevButtonOptions` и `\romkaChev\yii2\swiper\Swiper::$nextButtonOptions`. 
Настройка аналогична `\yii\helpers\BaseHtml::tag`

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'      => [
    'Slide 1',
    'Slide 2',
    'Slide 3'
  ],
  'behaviours' => [
    'prevButton',
    'nextButton'
  ],
  'prevButtonOptions' => [
    'tag'   => 'span',
    'class' => 'custom-prev-class'
  ],
  'nextButtonOptions' => [
    'tag'   => 'span',
    'class' => 'custom-next-class'
  ]
] );
```

