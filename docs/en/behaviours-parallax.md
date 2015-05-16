# Parallax

Swiper allows you to create galleries with parallax effect. 
This functionality is *partially* built into the widget.

More information can be found on the description page slider API
in the section 'Parallax' at the bottom of the page. [http://www.idangero.us/swiper/api/](http://www.idangero.us/swiper/api/)

## Partial support

Despite the fact that the widget provides a standard tool for parallax,
you should configuring effects for each slide manually,
to support the better customization.

Therefore, slides and content need to be configured through the options, for example, `\yii\helpers\BaseHtml::tag`

## Configuring parallax

You can configure parallax through the field `\romkaChev\yii2\swiper\Swiper::$parallaxOptions`, similar to `\yii\helpers\BaseHtml::tag`

> Pay attention: to parallax get worked, 
  you should declare option `parallax = true` in field `\romkaChev\yii2\swiper\Swiper::$pluginOptions`

Also, to simplify work with widget the following constants were introduced:

| Constant                        | Value         | Direct analogue                                                   |
|---------------------------------|---------------|-------------------------------------------------------------------|
| `Swiper::PARALLAX_BACKGROUND`   | `background`  | `Swiper::$parallaxOptions['style'] = 'background-image:url(...)'` |
| `Swiper::PARALLAX_TRANSITION`   | `transition`  | `Swiper::$parallaxOptions['data']['swiper-parallax']`             |
| `Swiper::PARALLAX_TRANSITION_X` | `transitionX` | `Swiper::$parallaxOptions['data']['swiper-parallax-x']`           |
| `Swiper::PARALLAX_TRANSITION_Y` | `transitionY` | `Swiper::$parallaxOptions['data']['swiper-parallax-y']`           |
| `Swiper::PARALLAX_DURATION`     | `duration`    | `Swiper::$parallaxOptions['data']['swiper-duration']`             |


Example:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

echo Swiper::widget( [
  'items' => [
    [
    /**
     * For each element of each slide, we specify different offsets
     * depending on the progress of the transition to the slide.
     */
      'content' => [
        Html::tag('div', 'Slide 1',       [ 'data' => [ 'swiper-parallax' => -100 ] ] ),
        Html::tag('div', 'Subtitle 1',    [ 'data' => [ 'swiper-parallax' => -200 ] ] ),
        Html::tag('div', '<p>Text 1</p>', [ 'data' => [ 'swiper-parallax' => -300 ] ] ),
      ]
    ],
    [
      'content' => [
        Html::tag('div', 'Slide 2',       [ 'data' => [ 'swiper-parallax' => -100 ] ] ),
        Html::tag('div', 'Subtitle 2',    [ 'data' => [ 'swiper-parallax' => -200 ] ] ),
        Html::tag('div', '<p>Text 2</p>', [ 'data' => [ 'swiper-parallax' => -300 ] ] ),
      ]
    ],
    [
      'content' => [
        Html::tag('div', 'Slide 3',       [ 'data' => [ 'swiper-parallax' => -100 ] ] ),
        Html::tag('div', 'Subtitle 3',    [ 'data' => [ 'swiper-parallax' => -200 ] ] ),
        Html::tag('div', '<p>Text 3</p>', [ 'data' => [ 'swiper-parallax' => -300 ] ] ),
      ]
    ]
  ],
  'behaviours' => [
    'parallax' // Declare behaviour "parallax"
  ],
  'parallaxOptions' => [ // Configuring parallax
    'background' => 'http://placehold.it/2536x1080',
    'transition' => '-23%',
    'data' => [
      'duration' => '750' // Set option directly
    ]
  ],
  'pluginOptions' => [
    Swiper::OPTION_PARALLAX => true // Specifies that the parallax included
  ]
] );
```
