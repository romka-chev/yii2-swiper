# Conflicts of aliases and direct options

If both are set, and a slide, and a direct option, the alias will be accepted, since it a higher priority.

Example:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;

echo Swiper::widget( [
  'items'       => [
    [
      'content' => 'Slide 1',
      'hash'    => 'alias-hash',  // This value will be applied
      'options' => [
        'data' => [
          'hash' => 'direct-hash'
        ]
      ]
    ]
  ],
  'parallaxOptions' => [
    'duration' => 750, // This value will be applied
    'data' => [
      'swiper-duration' => 2000
    ]
  ]
] );
```

## Configuring background

When configuring the background, it will be added to the end section `style` of html-options of tag

|Alias                        |Where will be added                |
|-----------------------------|-----------------------------------|
|`Slide::BACKGROUND`          |`Slide::$options['style']`         |
|`Swiper::PARALLAX_BACKGROUND`|`Swiper::$parallaxOptions['style']`|

Example:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'content'    => 'Slide 01',
  'background' => 'http://placehold.it/500x300',
  'options'    => [
    'style' => 'color:#fff'
  ]
]);

echo $slide->options['style']; // color:#fff; background-image(http://placehold.it/500x300)
```

---

It should also be borne in mind that when you set the background directly in settings `style`, 
alias will be added at the end of section `style`.

Exmaple:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'content'    => 'Slide 01',
  'background' => 'http://placehold.it/500x300',
  'options'    => [
    'style' => 'background-image(http://placehold.it/1000x1000)'
  ]
]);

echo $slide->options['style']; 
// background-image(http://placehold.it/1000x1000); background-image(http://placehold.it/500x300)
```
