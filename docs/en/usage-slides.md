# Slides

## Building widget

When building a widget, all the slides configuring as an array of field `\romkaChev\yii2\swiper\Swiper::$items`.

Example:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      'Slide 01',
      [
        'content' => 'Slide 02'
      ],
      [
        'content' => [
          '<h1>Title</h1>',
          '<h3>Subtitle</h3>',
          '<p>Slide 03</p>'
        ]
      ]
    ],
]);
```
## Setting slide
### Content

> Note: When you create a slide without content, the field `\romkaChev\yii2\swiper\Slide::$content` will have a value `null`

### Aliases

When creating a slide you can set through the aliases background and hash-value in the address bar.
Also, the slide can be configured in any way similar to the setting`\yii\helpers\BaseHtml::tag`

#### Background

By default, the background can be specified in two ways:

* Through alias `\romkaChev\yii2\swiper\Slide::BACKGROUND` - in this case
  You do not need to specify the property background-image. You should only give the image link.
* Through the option `style` of html settings directly

Example:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      // Alias with named constant
      [
        Slide::BACKGROUND => 'http://placehold.it/350x150'
      ],
      // Alias
      [
        'background' => 'http://placehold.it/350x150'
      ],
      // 'style' option
      [
        'options' => [
          'style' => 'background-image:url(http://placehold.it/350x150)'
        ]
      ]
    ],
]);
```
#### Hash

By default, the `hash` can be specified in two ways:

* Through alias `\romkaChev\yii2\swiper\Slide::HASH`
* Through `\romkaChev\yii2\swiper\Slide::$options['data']['hash']` directly

Example:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      // Alias with named constant
      [
        Slide::HASH => 'slide01'
      ],
      // Alias
      [
        'hash' => 'slide01'
      ],
      // data['hash'] option
      [
        'options' => [
          'data' => [
            'hash' => 'slide01'
          ]
        ]
      ]
    ],
]);
```
### Common setting

Slide can be freely configured similarly `[[\yii\helpers\BaseHtml::tag]]`.
All options specified in `\romkaChev\yii2\swiper\Slide::$options` They will be transferred in the tag options.

Example:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      [
        'content' => 'Slide text',
        'options' => [
          'tag'   => 'a',
          'href'  => '#',
          'style' => 'color: #fff',
          'id'    => 'my-slide-id',
          'class' => 'my-slide-class',
          'data'  => [
            'id'   => 'my-slide-id',
            'hash' => 'my-hash'
          ]
        ]
      ]
    ],
]);
/**
 * This slide will be presented with the following code:
 *
 * <a id        = "my-slide-id" 
 *    class     = "swiper-slide my-slide-class" 
 *    href      = "#" 
 *    style     = "color: #fff" 
 *    data-id   = "my-data-slide-id" 
 *    data-hash = "my-hash">Slide text</a>
 */
```

### Setting objects `\romkaChev\yii2\swiper\Slide`

When transferring to the widget as slide object instance of `\romkaChev\yii2\swiper\Slide`
**will not** be produced setting the slide, since it implies that it is already fully configured.

At the same time with him **will not** be made as follows:

* Apply batch options
* Automatically set `Slide::$options['id']`
* Automatically added class `swiper-slide` into `Slide::$options['class']`

Example:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;
use \romkaChev\yii2\swiper\Slide;

echo Swiper::widget( [
  'items'       => [
    new Slide([
      'content' => 'Slide 3', 
      'options' => [
        /**
         * 'id'    will not be generated automatically
         * 'class' will be left empty
         */
        'href' => '/site/url'
      ]
    ])
  ],
  /**
   * In this example, the group options will not be applied to the slide,
   * because it is of type '\romkaChev\yii2\swiper\Slide'
   */
  'itemOptions' => [
    'options' => [
      'tag'   => 'a',
      'href'  => 'javascript:void(0)',
      'class' => 'batch-class'
    ]
  ]
] );
```
