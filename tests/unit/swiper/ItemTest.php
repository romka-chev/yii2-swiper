<?php
namespace romkaChev\yii2\swiper\tests\unit\swiper;


use romkaChev\yii2\swiper\Slide;
use romkaChev\yii2\swiper\Swiper;
use romkaChev\yii2\swiper\tests\unit\BaseTestCase;

class ItemTest extends BaseTestCase
{

    public function testBatchOptions()
    {
        $swiper = new Swiper( [
            'items'       => [
                [
                    'content' => 'Slide 00'
                ],
                [
                    'options' => [
                        'style' => 'background-image(http://placehold.it/500x300&text=01)',
                        'data'  => [
                            'hash' => 'concrete-hash',
                            'rel'  => 'concrete-rel'
                        ]
                    ]
                ],
                [
                    'hash'       => 'concrete-hash',
                    'background' => 'http://placehold.it/500x300&text=02',
                    'options'    => [
                        'class' => 'concrete-class',
                        'id'    => 'concrete-id',
                        'data'  => [
                            'rel' => 'concrete-rel'
                        ]
                    ]
                ]
            ],
            'itemOptions' => [
                'content'    => 'batch-content',
                'hash'       => 'batch-hash',
                'background' => 'http://placehold.it/500x300&text=batch',
                'options'    => [
                    'style' => 'color:#fff',
                    'class' => 'batch-class',
                    'id'    => 'batch-id',
                    'data'  => [
                        'rel' => 'batch-rel'
                    ]
                ]
            ]
        ] );

        $item00 = $swiper->items[0];
        $item01 = $swiper->items[1];
        $item02 = $swiper->items[2];

        $this->assertEquals( 'Slide 00', $item00->content );
        $this->assertSame( null, $item00->hash );
        $this->assertArrayNotHasKey( 'hash', $item00->options['data'] );
        $this->assertEquals( 'http://placehold.it/500x300&text=batch', $item00->background );
        $this->assertEquals( 'color:#fff; background-image:url(http://placehold.it/500x300&text=batch)', $item00->options['style'] );
        $this->assertEquals( 'batch-class swiper-slide', $item00->options['class'] );
        $this->assertEquals( "{$swiper->containerOptions['id']}-slide-0", $item00->options['id'] );
        $this->assertEquals( 'batch-rel', $item00->options['data']['rel'] );

        $this->assertEquals( 'batch-content', $item01->content );
        $this->assertEquals( 'concrete-hash', $item01->hash );
        $this->assertEquals( 'concrete-hash', $item01->options['data']['hash'] );
        $this->assertEquals( 'http://placehold.it/500x300&text=batch', $item01->background );
        $this->assertEquals( 'background-image(http://placehold.it/500x300&text=01); background-image:url(http://placehold.it/500x300&text=batch)', $item01->options['style'] );
        $this->assertEquals( 'batch-class swiper-slide', $item01->options['class'] );
        $this->assertEquals( "{$swiper->containerOptions['id']}-slide-1", $item01->options['id'] );
        $this->assertEquals( 'concrete-rel', $item01->options['data']['rel'] );

        $this->assertEquals( 'batch-content', $item02->content );
        $this->assertEquals( 'concrete-hash', $item02->hash );
        $this->assertEquals( 'concrete-hash', $item02->options['data']['hash'] );
        $this->assertEquals( 'http://placehold.it/500x300&text=02', $item02->background );
        $this->assertEquals( 'color:#fff; background-image:url(http://placehold.it/500x300&text=02)', $item02->options['style'] );
        $this->assertEquals( 'batch-class swiper-slide concrete-class', $item02->options['class'] );
        $this->assertEquals( "concrete-id", $item02->options['id'] );
        $this->assertEquals( 'concrete-rel', $item02->options['data']['rel'] );
    }

    public function testBatchOptionsWithConcreteClass()
    {

        $swiper = new Swiper( [
            'items'       => [
                new Slide( [
                    'hash'       => 'concrete-hash',
                    'background' => 'http://placehold.it/500x300&text=00',
                    'options'    => [
                        'data' => [
                            'rel' => 'concrete-rel'
                        ]
                    ]
                ] )
            ],
            'itemOptions' => [
                'content'    => 'batch-content',
                'hash'       => 'batch-hash',
                'background' => 'http://placehold.it/500x300&text=batch',
                'options'    => [
                    'style' => 'color:#fff',
                    'class' => 'batch-class',
                    'id'    => 'batch-id',
                    'data'  => [
                        'rel' => 'batch-rel'
                    ]
                ]
            ]
        ] );

        $item00 = $swiper->items[0];

        $this->assertSame( null, $item00->content );

        $this->assertEquals( 'concrete-hash', $item00->hash );
        $this->assertEquals( 'concrete-hash', $item00->options['data']['hash'] );
        $this->assertEquals( 'http://placehold.it/500x300&text=00', $item00->background );
        $this->assertEquals( 'background-image:url(http://placehold.it/500x300&text=00)', $item00->options['style'] );

        $this->assertArrayNotHasKey( 'class', $item00->options );
        $this->assertArrayNotHasKey( 'id', $item00->options );

        $this->assertEquals( 'concrete-rel', $item00->options['data']['rel'] );
    }
}