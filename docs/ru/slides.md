# Слайды

## Построение виджета

При построении виджета все слайды указываются как массив в поле [[\romkaChev\yii2\swiper\Swiper::$items]].
Если слайд не имеет тип [[\romkaChev\yii2\swiper\Slide]], то виджет попытается привести его к этом типу.

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Swiper;
use \romkaChev\yii2\swiper\Slide;

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
      ],
      new Slide('Слайд 04'),
      new Slide([
        'content' => 'Слайд 05'
      ]),
      new Slide([
        'content' => [
          '<h1>Заголовок</h1>',
          '<h3>Подзаголовок</h3>',
          '<p>Слайд 05</p>'
        ]
      ]),
    ],
]);
```
## Настройка слайда
### Контент

> Заметка: При создании слайда без контента, поле [[\romkaChev\yii2\swiper\Slide::$content]] будет иметь значение [[null]]

Слайды принимают в конструктор несколько типов:

* Строка
* Массив

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

// Конструктор со строкой
$slide = new Slide('Слайд 01');
echo $slide->content; // Слайд 01

// Конструктор с массивом
$slide = new Slide([
  'content' => 'Слайд 01'
]);
echo $slide->content; // Слайд 01

// Конструктор с массивом строк в контенте
$slide = new Slide([
  'content' => [
    '<h1>Заголовок</h1>',
    '<h3>Подзаголовок</h3>',
    '<p>Слайд 01</p>'
  ]
]);
echo $slide->content; // <h1>Заголовок</h1><h3>Подзаголовок</h3><p>Слайд 01</p>
```

### Короткие алиасы

При создании слайдов есть возможность задавать через алиасы фон и hash-значение в адресной строке.
Также слайд можно настроить любым образом аналогично настройке [[\yii\helpers\BaseHtml::tag]]

#### Фон

Стандартно фон может быть задан двумя способами:

* Через короткий алиас \romkaChev\yii2\swiper\Slide::BACKGROUND - в данном случае 
  не нужно указывать свойство background-image, а достаточно только ссылки на изображение
* Через опцию style напрямую

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

// Короткий алиас
$slide = new Slide([
  Slide::BACKGROUND => 'http://placehold.it/350x150'
]);

// Короткий алиас вручную
$slide = new Slide([
  'background' => 'http://placehold.it/350x150'
]);

// опция style
$slide = new Slide([
  'options' => [
    'style' => 'background-image:url(http://placehold.it/350x150)'
  ]
]);
```

#### Hash

Стандартно hash может быть задан двумя способами:

* Через короткий алиас \romkaChev\yii2\swiper\Slide::HASH
* Через опцию data['hash'] напрямую

Пример:

```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

// Короткий алиас
$slide = new Slide([
  Slide::HASH => 'slide01'
]);

// Короткий алиас вручную
$slide = new Slide([
  'hash' => 'slide01'
]);

// опция data['hash']
$slide = new Slide([
  'options' => [
    'data' => [
      'hash' => 'slide01'
    ]
  ]
]);
```

### Общая настройка

Слайд может быть свободно настроен аналогично [[\yii\helpers\BaseHtml::tag]].
Все опции, указанные в \romkaChev\yii2\swiper\Slide::$options будут переданы в опции тега.

Пример:


```PHP
<?php
use \romkaChev\yii2\swiper\Slide;

$slide = new Slide([
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
