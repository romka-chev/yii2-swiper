# Параллакс

Swiper позволяет делать галереи с эффектом параллакса. 
Эта функциональность *частично* встроена в виджет.

Дополнительную информацию вы можете найти на странице с описанием API слайдера 
в секции 'Parallax' внизу страницы. [http://www.idangero.us/swiper/api/](http://www.idangero.us/swiper/api/)

## Частичная поддержка

Несмотря на то, что виджет предоставляет стандартное средство для работы с параллаксом, 
настраивать эффекты для каждого слайда или частей слайда придется вручную, 
чтобы поддержать наибольшую кастомизацию.

Поэтому для слайдов и их контента нужно настраивать опции через, например, **\yii\helpers\BaseHtml::tag**

## Настройка параллакса

Настройка параллакса произодится через поле **parallaxOptions**, аналогично **\yii\helpers\BaseHtml::tag**

> Обратите внимание: чтобы параллакс заработал, 
  необходимо указать **'parallax'** = true в поле **pluginOptions**

Также для упрощения работы были введены следующие константы:

| Константа                     | Значение      | Прямой аналог                                                         |
|-------------------------------|---------------|-----------------------------------------------------------------------|
| Swiper::PARALLAX_BACKGROUND   | `background`  | Атрибут `background-image:url(...)` поля `style` в **parallaxOptions**|
| Swiper::PARALLAX_TRANSITION   | `transition`  | parallaxOptions['data']['transition']                                 |
| Swiper::PARALLAX_TRANSITION_X | `transitionX` | parallaxOptions['data']['transition-x']                               |
| Swiper::PARALLAX_TRANSITION_Y | `transitionY` | parallaxOptions['data']['transition-y']                               |
| Swiper::PARALLAX_DURATION     | `duration`    | parallaxOptions['data']['duration']                                   |


Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

echo Swiper::widget( [
  'items' => [
    [
    /**
     * Здесь для каждого элемента каждого слайда мы узазываем разные смещения
     * в зависимости от прогресса перехода к слайду.
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
    'parallax' // Объявление поведения "параллакс"
  ],
  'parallaxOptions' => [ // Настраиваем параллакс
    'background' => 'http://placehold.it/2536x1080',
    'transition' => '-23%',
    'data' => [
      'duration' => '750' // Указываем свойсво напрямую, в обход алиасов
    ]
  ],
  'pluginOptions' => [
    Swiper::OPTION_PARALLAX => true // Указываем, что параллакс включен
  ]
] );
```
