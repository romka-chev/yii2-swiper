# Buttons "prev" and "next"

To connect these buttons, you must declare behaviours `prevButton` and `nextButton` in field `\romkaChev\yii2\swiper\Swiper::$behaviours`, 
otherwise the buttons will not be rendered.

Example:

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

// With named constants
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

## Setting buttons

Set buttons control tags through the field `\romkaChev\yii2\swiper\Swiper::$prevButtonOptions` and `\romkaChev\yii2\swiper\Swiper::$nextButtonOptions`. 
Setting is similar to `\yii\helpers\BaseHtml::tag`

Example:

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

