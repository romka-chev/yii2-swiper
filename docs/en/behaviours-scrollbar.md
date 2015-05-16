# Scrollbar

To connect these buttons you must declare behaviour `scrollbar` in field `\romkaChev\yii2\swiper\Swiper::$behaviours`, 
otherwise scrollbar will not be rendered.

Example:

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
    'scrollbar' // Declaration of scrollbar
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
    Swiper::BEHAVIOUR_SCROLLBAR // Declaration of scrollbar
  ]
] );
```

## Configuring the scrollbar

You can configure scrollbar through the field `\romkaChev\yii2\swiper\Swiper::$scrollbarOptions`. 
Configuring is similar to `\yii\helpers\BaseHtml::tag`

Example:

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
    'scrollbar' // Declaration of scrollbar
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
