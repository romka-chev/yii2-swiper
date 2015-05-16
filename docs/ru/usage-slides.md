# Слайды

## Построение виджета

При построении виджета все слайды указываются как массив в поле `\romkaChev\yii2\swiper\Swiper::$items`.

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      'Слайд 01',
      [
        'content' => 'Слайд 02'
      ],
      [
        'content' => [
          '<h1>Заголовок</h1>',
          '<h3>Подзаголовок</h3>',
          '<p>Слайд 03</p>'
        ]
      ]
    ],
]);
```
## Настройка слайда
### Контент

> Заметка: При создании слайда без контента, поле `\romkaChev\yii2\swiper\Slide::$content` будет иметь значение `null`

### Алиасы

При создании слайдов есть возможность задавать через алиасы фон и hash-значение в адресной строке.
Также слайд можно настроить любым образом аналогично настройке `\yii\helpers\BaseHtml::tag`

#### Фон

Стандартно фон может быть задан двумя способами:

* Через алиас `\romkaChev\yii2\swiper\Slide::BACKGROUND` - в данном случае 
  не нужно указывать свойство background-image. Достаточно только ссылки на изображение
* Через опцию `style` html-настроек тега напрямую

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      // Алиас c использованием константы
      [
        Slide::BACKGROUND => 'http://placehold.it/350x150'
      ],
      // Алиас вручную
      [
        'background' => 'http://placehold.it/350x150'
      ],
      // опция 'style'
      [
        'options' => [
          'style' => 'background-image:url(http://placehold.it/350x150)'
        ]
      ]
    ],
]);
```
#### Hash

Стандартно `hash` может быть задан двумя способами:

* Через алиас `\romkaChev\yii2\swiper\Slide::HASH`
* Через `\romkaChev\yii2\swiper\Slide::$options['data']['hash']` напрямую

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      // Алиас c использованием константы
      [
        Slide::HASH => 'slide01'
      ],
      // Алиас вручную
      [
        'hash' => 'slide01'
      ],
      // опция data['hash']
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
### Общая настройка

Слайд может быть свободно настроен аналогично `[[\yii\helpers\BaseHtml::tag]]`.
Все опции, указанные в `\romkaChev\yii2\swiper\Slide::$options` будут переданы в опции тега.

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;

Swiper::widget([
    'items'      => [
      [
        'content' => 'Текст слайда',
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
 * При рендеринге этот слайд будет представлен следующим кодом:
 *
 * <a id        = "my-slide-id" 
 *    class     = "swiper-slide my-slide-class" 
 *    href      = "#" 
 *    style     = "color: #fff" 
 *    data-id   = "my-data-slide-id" 
 *    data-hash = "my-hash">Текст слайда</a>
 */
```

### Настройка объектов `\romkaChev\yii2\swiper\Slide`

При передаче в виджет в качестве слайда экземпляра объекта `\romkaChev\yii2\swiper\Slide`
**не будет** произведена настройка слайда, так как подразумевается, что он уже полностью настроен.

При этом с ним **не будут** произведены следующие операции: 

* Применены групповые опции
* Автоматически задан `Slide::$options['id']`
* Автоматически добавлен класс `swiper-slide` в `Slide::$options['class']`

Пример:

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
         * 'id'    не будет задан автоматически
         * 'class' останется пустым
         */
        'href' => '/site/url'
      ]
    ])
  ],
  /**
   * В данном примере групповые опции не будут применены к слайду, 
   * так как он имеет тип '\romkaChev\yii2\swiper\Slide'
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
