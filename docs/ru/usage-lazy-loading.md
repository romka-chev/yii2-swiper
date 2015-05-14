# Lazy-loading

Swiper предоставляет возможность реализации ленивой загрузки изображений, 
но в виджете она не реализована в качестве стандартных средств.

Дополнительную информацию вы можете найти на странице с описанием API слайдера в секции 'Lazy Loading' внизу страницы.
[http://www.idangero.us/swiper/api/](http://www.idangero.us/swiper/api/)

Для того, чтобы использовать ленивую загрузку, необходимо вручную настроить теги для слайдов.

Пример:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

Swiper::widget( [
  'items'             => [
    [
      /**
       * Необходимо, чтобы у изображения был проставлен класс 'swiper-lazy', 
       * а также ссылка на изображение была указана не в 'src', а в 'data-src'
       *
       * Также, если нужно, чтобы во время загрузки был показан прелоадер,
       * необходимо добавить в слайд тег с классом 'swiper-lazy-preloader'
       */
      'content' => [
        Html::tag( 'img', '', [ 
          'class' => 'swiper-lazy', 
          'data'  => [ 
            'src' => 'http://lorempixel.com/1600/1200/nature/1' 
          ] 
        ] ),
        Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader' ] )
      ]
    ],
    [
      'content' => [
        Html::tag( 'img', '', [ 
          'class' => 'swiper-lazy', 
          'data' => [ 
            'src' => 'http://lorempixel.com/1600/1200/nature/2' 
          ] 
        ] ),
        Html::tag( 'div', '', [ 'class' => 'swiper-lazy-preloader swiper-lazy-preloader-white' ] )
      ]
    ]
  ],
  'pluginOptions'     => [
    'preloadImages' => false, // Для корректной работы необходимо отключить предзагрузку изображений
    'lazyLoading'   => true   // и указать, что мы хотим использовать ленивую загрузку
  ]
] );
```
