# Обзор виджета

Данный виджет использует версию Swiper v3.0.4+, дает возможность работы с [параллаксом](behaviours-parallax.md), 
[lazy-loading](usage-lazy-loading.md)'ом изображений и другими возможностями оригинального слайдера.

## Концепция поведений

Виджет для рендеринга управляющих элементов использует концепцию **поведений**. 

Поведение     | Где настраивается            | Описание                                                                       
------------- | ---------------------------- | -------------------------------------------------------------------------------
`pagination`  | `Swiper::$paginationOptions` | Отвечает за отображение [пагинации](behaviours-pagination.md)                  
`scrollbar`   | `Swiper::$scrollbarOptions`  | Отвечает за отображение [скроллбара](behaviours-scrollbar.md)                  
`prevButton`  | `Swiper::$prevButtonOptions` | Отвечает за отображение кнопки "[предыдущий](behaviours-navigation-buttons.md)"
`nextButton`  | `Swiper::$nextButtonOptions` | Отвечает за отображение кнопки "[следующий](behaviours-navigation-buttons.md)" 
`parallax`    | `Swiper::$parallaxOptions`   | **Частично** отвечает за отображение [параллакса](behaviours-parallax.md)      
`rtl`         | -                            | Отвечает за отображение контента [справа налево](behaviours-rtl.md)            

Таким образом, чтобы отобразить у слайдера одно из поведений, нужно:

* Обявить его в `Swiper::$behaviours`
* [Опционально] Настроить его

## Настройка слайдов

[Слайды](usage-slides.md) добавляются в виджет непосредственно через `Swiper::$items`. 
В качестве слайдов можно передавать как просто строки, так и массивы. 
Также можно передавать экземпляры класса `\romkaChev\yii2\swiper\Slide`, 
но при этом виджет [не будет его настраивать](usage-slides.md#%D0%9D%D0%B0%D1%81%D1%82%D1%80%D0%BE%D0%B9%D0%BA%D0%B0-%D0%BE%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D0%BE%D0%B2-romkachevyii2swiperslide).

> **Важно**! Не используйте класс `\romkaChev\yii2\swiper\Slide` в качестве слайда, 
  если вы не уверены, что знаете, зачем это делаете.

Помимо этого, можно производить [групповую настройку](options-slide-batch.md) слайдов.

Небольшой пример:

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

## Алиасы

Виджет предоставляет несколько [готовых алиасов](options-aliases.md) для работы наиболее важными частями слайдов 
и самого виджета.
При их задании они транслируются в их прямые аналоги и наоборот - при задании прямых аналогов, они транслируются в алиасы.

Пример работы с алиасами:

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
