# Lazy-loading

Swiper provides the possibility of implementing lazy loading images
but it is not implemented in widget as standard tool.

More information can be found on the page describing the API of the slider in section 'Lazy Loading' at the bottom of the page.
[http://www.idangero.us/swiper/api/](http://www.idangero.us/swiper/api/)

In order to use lazy loading, you must manually configure the tags for the slide.

Example:

```PHP
<?php
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

Swiper::widget( [
  'items'             => [
    [
      /**
       * It is necessary to have the image was affixed class 'swiper-lazy', 
       * and a link to the image was specified in 'data-src', not in 'src'
       *
       * Also, if you need to during the download was shown preloader
       * you should add to the slide tag with the class 'swiper-lazy-preloader'
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
    'preloadImages' => false, // To work correctly, you must turn off preload
    'lazyLoading'   => true   // and indicate that we want to use lazy loading
  ]
] );
```
