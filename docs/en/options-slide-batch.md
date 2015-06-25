# Batch slides configuration

The widget allows you to specify options for all slides at once through the field `Swiper::$itemOptions`, 
and each individually. 
In general, the batch options may be considered as an option by default.

The following batch settings will be deleted before merging,
because it must be unique for each slide:

* `Swiper::$itemOptions['hash']`
* `Swiper::$itemOptions['options']['hash']`
* `Swiper::$itemOptions['options']['id']`

> Please note: when setting up the slide batch options will be combined with options using a specific slide 
  [array_replace_recursive($batchOptions, $concreteOptions)](https://php.net/manual/ru/function.array-replace-recursive.php).

Example of batch options:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'       => [
    'Slide 1',
    'Slide 2'
    [
      'content' => 'Slide 3', 
      'options' => [
        /**
         * As an option a specific slide has a higher priority,
         * attribute 'href' will have value '/site/url', not 'javascript:void(0)'
         */
        'href' => '/site/url'
      ]
    ]
  ],
  'itemOptions' => [ // Here we specify the group options that will be applied to all slides
    'options' => [
      'tag'   => 'a',
      'href'  => 'javascript:void(0)',
      'class' => 'batch-class'
    ]
  ]
] );
```

### Inheritance options

When inheriting options, the following priorities:

> **Please note**, aliases of batch options have a higher priority than the direct options of a particular slide.

| Options                             | Priority         |
| ----------------------------------- | ---------------- |
| Aliases of concrete slide           | 1 - maximal      |
| Batch aliases                       | 2                |
| Direct options of concrete slides   | 3                |
| Direct batch options                | 4 - minimal      |

