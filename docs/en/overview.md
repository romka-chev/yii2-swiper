# Overview of widget

This widget uses Swiper version v3.0.4+, provides working with [parallax](behaviours-parallax.md), 
[lazy-loading](usage-lazy-loading.md) of images and other tools of original slider.

## Behaviours concept

Widget for rendering controls uses the concept of **behaviours**. 

Behaviour     | Where configuring            | Description                                                                       
------------- | ---------------------------- | -------------------------------------------------------------------------------
`pagination`  | `Swiper::$paginationOptions` | Responsible for rendering of [pagination](behaviours-pagination.md)                  
`scrollbar`   | `Swiper::$scrollbarOptions`  | Responsible for rendering of [scrollbar](behaviours-scrollbar.md)                  
`prevButton`  | `Swiper::$prevButtonOptions` | Responsible for rendering of button "[prev](behaviours-navigation-buttons.md)"
`nextButton`  | `Swiper::$nextButtonOptions` | Responsible for rendering of button "[next](behaviours-navigation-buttons.md)" 
`parallax`    | `Swiper::$parallaxOptions`   | **Partially** responsible for rendering of [parallax](behaviours-parallax.md)      
`rtl`         | -                            | Responsible for displaying from [right to left](behaviours-rtl.md)            

So, to display one of these behaviours you must:

* Specify it in `Swiper::$behaviours`
* [Optional] Customize it

## Configuring slides

[Slides](usage-slides.md) are added to the widget directly through `Swiper::$items`. 
As the slides can be passed as a string, and arrays.
You can also pass instances of `\romkaChev\yii2\swiper\Slide`, 
but widget [will not configure it](usage-slides.md#%D0%9D%D0%B0%D1%81%D1%82%D1%80%D0%BE%D0%B9%D0%BA%D0%B0-%D0%BE%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D0%BE%D0%B2-romkachevyii2swiperslide).

> **Important**! Do not use class`\romkaChev\yii2\swiper\Slide` directly as slide, 
  unless you are sure what you are doing.

Also you can make [batch configuration](options-slide-batch.md) of slides.

Little example:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;
use \romkaChev\yii2\swiper\Slide;

echo Swiper::widget( [
  'items'       => [
    'Slide 1',
    [
      'content' => 'Slide 2'
    ],
    new Slide([
      'content' => 'Slide 3'
    ])
  ]
] );
```

## Aliases

Widget provides a couple of [aliases](options-aliases.md) for working with most important parts of slides
and widget itself.
During specifying they are broadcast in their straight counterparts, 
and vice versa - when specifying direct analogues, they are translated into aliases.

Example of work with aliases:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
  'background' => 'http://placehold.it/800x600',
  'hash'       => 'slide01'
]);

echo $slide->background; // http://placehold.it/800x600
echo $slide->hash;       // slide01

echo $slide->options['style'];        // background-image:url(http://placehold.it/800x600)
echo $slide->options['data']['hash']; // slide01

```
