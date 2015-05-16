# Display from right to left

To display the content from right to left, you must declare
behavior `rtl` in field `romkaChev\yii2\swiper\Swiper::$behaviours`, 
otherwise behaviour will not be applied.

This behavior only adds an option `'dir' = 'rtl'` to the container-tag of widget.

> Note: A similar effect would be, if you specify `Swiper::$containerOptions['dir'] = 'rtl'`

Example:

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

// With named constant
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

// Through container options
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
