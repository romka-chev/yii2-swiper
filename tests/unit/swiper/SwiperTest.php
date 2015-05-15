<?php
namespace romkaChev\yii2\swiper\tests\unit\swiper;


use romkaChev\yii2\swiper\Slide;
use romkaChev\yii2\swiper\Swiper;
use romkaChev\yii2\swiper\tests\unit\BaseTestCase;

class SwiperTest extends BaseTestCase
{

    public function testInvalidBehaviour()
    {
        $this->setExpectedException( '\InvalidArgumentException', 'Unknown behaviour badBehaviour' );

        new Swiper( [
            'behaviours' => [
                Swiper::BEHAVIOUR_PAGINATION,
                'badBehaviour'
            ]
        ] );
    }

    public function testConstructItemsViaStrings()
    {
        $swiper = new Swiper( [
            'items' => [
                'slide 01',
                'slide 02',
                'slide 03',
            ]
        ] );

        foreach ($swiper->items as $item) {
            $this->assertInstanceOf( Slide::className(), $item );
        }
    }

    public function testConstructItemsViaArrays()
    {
        $swiper = new Swiper( [
            'items' => [
                [ 'content' => 'slide 01' ],
                [ 'content' => 'slide 02' ],
                [ 'content' => 'slide 03' ],
            ]
        ] );

        foreach ($swiper->items as $item) {
            $this->assertInstanceOf( Slide::className(), $item );
        }
    }

    public function testConstructItemsViaObjects()
    {
        $swiper = new Swiper( [
            'items' => [
                new Slide( 'slide 01' ),
                new Slide( 'slide 02' ),
                new Slide( 'slide 03' ),
            ]
        ] );

        foreach ($swiper->items as $item) {
            $this->assertInstanceOf( Slide::className(), $item );
        }
    }

    public function testConstructItemsComplex()
    {
        $swiper = new Swiper( [
            'items' => [
                'slide 01',
                [ 'content' => 'slide 02' ],
                new Slide( 'slide 03' ),
            ]
        ] );

        foreach ($swiper->items as $item) {
            $this->assertInstanceOf( Slide::className(), $item );
        }
    }

    public function testInvalidItemsInjectionFailed()
    {
        $swiper = new Swiper( [
            'items' => [
                'slide 01',
                [ 'content' => 'slide 02' ],
                new Slide( 'slide 03' ),
            ]
        ] );

        $swiper->items[] = 'badValue';
        $swiper->items[] = [ 'content' => 'slide 02' ];

        $this->setExpectedException( 'yii\base\ErrorException', 'must be an instance of romkaChev\yii2\swiper\Slide' );

        $swiper->run();
    }

    public function testValidItemInjectionSuccessed()
    {
        $swiper = new Swiper( [
            'items' => [
                'slide 01',
                [ 'content' => 'slide 02' ],
                new Slide( 'slide 03' ),
            ]
        ] );

        $swiper->items[] = new Slide( 'slide 04' );

        $swiper->run();
    }

    public function testItemsInjectionViaSpecialMethodSuccessed()
    {
        $swiper = new Swiper( [
            'items' => [
                'slide 01',
                [ 'content' => 'slide 02' ],
                new Slide( 'slide 03' ),
            ]
        ] );

        $swiper->addItem( 'slide 04' );
        $swiper->addItem( [ 'content' => 'slide 05' ] );
        $swiper->addItem( new Slide( 'slide 03' ) );

        $swiper->run();
    }

    public function testBatchItemsInjectionViaSpecialMethodSuccessed()
    {
        $swiper = new Swiper( [
            'items' => [
                'slide 01',
                [ 'content' => 'slide 02' ],
                new Slide( 'slide 03' ),
            ]
        ] );

        $swiper->addItems( [
            'slide 04',
            [ 'content' => 'slide 05' ],
            new Slide( 'slide 03' )
        ] );

        $swiper->run();
    }
    public function testContainerOptions()
    {
        $swiper = new Swiper( [
            'items'            => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'containerOptions' => [
                'id'    => 'custom-id',
                'class' => 'custom-class custom-another-class',
                'data'  => [
                    'id' => 'custom-data-id'
                ]
            ]
        ] );

        $this->assertEquals( 'custom-id', $swiper->containerOptions['id'] );
        $this->assertEquals( 'custom-id-wrapper', $swiper->wrapperOptions['id'] );
        $this->assertEquals( 'custom-id-pagination', $swiper->paginationOptions['id'] );
        $this->assertEquals( 'custom-id-scrollbar', $swiper->scrollbarOptions['id'] );
        $this->assertEquals( 'custom-id-button-next', $swiper->nextButtonOptions['id'] );
        $this->assertEquals( 'custom-id-button-prev', $swiper->prevButtonOptions['id'] );
        $this->assertEquals( 'custom-id-parallax', $swiper->parallaxOptions['id'] );

        $this->assertEquals( 'custom-class custom-another-class swiper-container', $swiper->containerOptions['class'] );
        $this->assertEquals( 'custom-data-id', $swiper->containerOptions['data']['id'] );
    }

    public function testWrapperOptions()
    {
        $swiper = new Swiper( [
            'items'          => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'wrapperOptions' => [
                'id'    => 'custom-wrapper-id',
                'class' => 'custom-wrapper-class custom-another-wrapper-class',
                'data'  => [
                    'id' => 'custom-data-wrapper-id'
                ]
            ]
        ] );

        $this->assertEquals( 'custom-wrapper-id', $swiper->wrapperOptions['id'] );
        $this->assertEquals( 'custom-wrapper-class custom-another-wrapper-class swiper-wrapper', $swiper->wrapperOptions['class'] );
        $this->assertEquals( 'custom-data-wrapper-id', $swiper->wrapperOptions['data']['id'] );
    }

    public function testPaginationOptions()
    {
        $swiper = new Swiper( [
            'items'             => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'paginationOptions' => [
                'id'    => 'custom-pagination-id',
                'class' => 'custom-pagination-class custom-another-pagination-class',
                'data'  => [
                    'id' => 'custom-data-pagination-id'
                ]
            ]
        ] );

        $this->assertEquals( 'custom-pagination-id', $swiper->paginationOptions['id'] );
        $this->assertEquals( 'custom-pagination-class custom-another-pagination-class swiper-pagination', $swiper->paginationOptions['class'] );
        $this->assertEquals( 'custom-data-pagination-id', $swiper->paginationOptions['data']['id'] );
    }

    public function testScrollbarOptions()
    {
        $swiper = new Swiper( [
            'items'            => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'scrollbarOptions' => [
                'id'    => 'custom-scrollbar-id',
                'class' => 'custom-scrollbar-class custom-another-scrollbar-class',
                'data'  => [
                    'id' => 'custom-data-scrollbar-id'
                ]
            ]
        ] );

        $this->assertEquals( 'custom-scrollbar-id', $swiper->scrollbarOptions['id'] );
        $this->assertEquals( 'custom-scrollbar-class custom-another-scrollbar-class swiper-scrollbar', $swiper->scrollbarOptions['class'] );
        $this->assertEquals( 'custom-data-scrollbar-id', $swiper->scrollbarOptions['data']['id'] );
    }

    public function testNextButtonOptions()
    {
        $swiper = new Swiper( [
            'items'             => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'nextButtonOptions' => [
                'id'    => 'custom-next-button-id',
                'class' => 'custom-next-button-class custom-another-next-button-class',
                'data'  => [
                    'id' => 'custom-data-next-button-id'
                ]
            ]
        ] );

        $this->assertEquals( 'custom-next-button-id', $swiper->nextButtonOptions['id'] );
        $this->assertEquals( 'custom-next-button-class custom-another-next-button-class swiper-button-next', $swiper->nextButtonOptions['class'] );
        $this->assertEquals( 'custom-data-next-button-id', $swiper->nextButtonOptions['data']['id'] );
    }

    public function testPrevButtonOptions()
    {
        $swiper = new Swiper( [
            'items'             => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'prevButtonOptions' => [
                'id'    => 'custom-prev-button-id',
                'class' => 'custom-prev-button-class custom-another-prev-button-class',
                'data'  => [
                    'id' => 'custom-data-prev-button-id'
                ]
            ]
        ] );

        $this->assertEquals( 'custom-prev-button-id', $swiper->prevButtonOptions['id'] );
        $this->assertEquals( 'custom-prev-button-class custom-another-prev-button-class swiper-button-prev', $swiper->prevButtonOptions['class'] );
        $this->assertEquals( 'custom-data-prev-button-id', $swiper->prevButtonOptions['data']['id'] );
    }

    public function testParallaxBackgroundMatching()
    {
        $swiper = new Swiper( [
            'items'           => [
                'slide 01',
            ],
            'parallaxOptions' => [
                'style' => 'color: #ffffff; background:url(http://lorempixel.com/900/600/nightlife/2/);',
                'data'  => [
                    'swiper-parallax'          => '23%',
                    'swiper-parallax-duration' => '750',
                ]
            ]
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/2/', $swiper->parallaxOptions['background'] );


        $swiper = new Swiper( [
            'items'           => [
                'slide 01',
            ],
            'parallaxOptions' => [
                'style' => 'color: #ffffff; background-image:url(http://lorempixel.com/900/600/nightlife/2/);',
                'data'  => [
                    'swiper-parallax'          => '23%',
                    'swiper-parallax-duration' => '750',
                ]
            ]
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/2/', $swiper->parallaxOptions['background'] );
    }

    public function testParallaxOptionsViaShorthands()
    {
        $swiper = new Swiper( [
            'items'           => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'parallaxOptions' => [
                Swiper::PARALLAX_BACKGROUND   => 'http://lorempixel.com/900/600/nightlife/2/',
                Swiper::PARALLAX_TRANSITION   => '23%',
                Swiper::PARALLAX_TRANSITION_X => '10%',
                Swiper::PARALLAX_TRANSITION_Y => '15%',
                Swiper::PARALLAX_DURATION     => '750',
                'id'                          => 'custom-parallax-id',
                'class'                       => 'custom-parallax-class custom-another-parallax-class',
                'data'                        => [
                    'id' => 'custom-data-parallax-id'
                ]
            ]
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/2/', $swiper->parallaxOptions['background'] );
        $this->assertEquals( '23%', $swiper->parallaxOptions['transition'] );
        $this->assertEquals( '10%', $swiper->parallaxOptions['transitionX'] );
        $this->assertEquals( '15%', $swiper->parallaxOptions['transitionY'] );
        $this->assertEquals( '750', $swiper->parallaxOptions['duration'] );

        $this->assertEquals( 'background-image:url(http://lorempixel.com/900/600/nightlife/2/)', $swiper->parallaxOptions['style'] );
        $this->assertEquals( '23%', $swiper->parallaxOptions['data']['swiper-parallax'] );
        $this->assertEquals( '10%', $swiper->parallaxOptions['data']['swiper-parallax-x'] );
        $this->assertEquals( '15%', $swiper->parallaxOptions['data']['swiper-parallax-y'] );
        $this->assertEquals( '750', $swiper->parallaxOptions['data']['swiper-parallax-duration'] );

        $this->assertEquals( 'custom-parallax-id', $swiper->parallaxOptions['id'] );
        $this->assertEquals( 'custom-parallax-class custom-another-parallax-class parallax-bg', $swiper->parallaxOptions['class'] );
        $this->assertEquals( 'custom-data-parallax-id', $swiper->parallaxOptions['data']['id'] );
    }

    public function testParallaxOptionsViaDirectAttributes()
    {
        $swiper = new Swiper( [
            'items'           => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'parallaxOptions' => [
                'style' => 'color: #ffffff; background-image:url(http://lorempixel.com/900/600/nightlife/2/);',
                'data'  => [
                    'swiper-parallax'          => '23%',
                    'swiper-parallax-x'        => '10%',
                    'swiper-parallax-y'        => '15%',
                    'swiper-parallax-duration' => '750',
                    'id'                       => 'custom-data-parallax-id'
                ],
                'id'    => 'custom-parallax-id',
                'class' => 'custom-parallax-class custom-another-parallax-class',
            ]
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/2/', $swiper->parallaxOptions['background'] );
        $this->assertEquals( '23%', $swiper->parallaxOptions['transition'] );
        $this->assertEquals( '10%', $swiper->parallaxOptions['transitionX'] );
        $this->assertEquals( '15%', $swiper->parallaxOptions['transitionY'] );
        $this->assertEquals( '750', $swiper->parallaxOptions['duration'] );

        $this->assertEquals( 'color: #ffffff; background-image:url(http://lorempixel.com/900/600/nightlife/2/);', $swiper->parallaxOptions['style'] );
        $this->assertEquals( '23%', $swiper->parallaxOptions['data']['swiper-parallax'] );
        $this->assertEquals( '10%', $swiper->parallaxOptions['data']['swiper-parallax-x'] );
        $this->assertEquals( '15%', $swiper->parallaxOptions['data']['swiper-parallax-y'] );
        $this->assertEquals( '750', $swiper->parallaxOptions['data']['swiper-parallax-duration'] );

        $this->assertEquals( 'custom-parallax-id', $swiper->parallaxOptions['id'] );
        $this->assertEquals( 'custom-parallax-class custom-another-parallax-class parallax-bg', $swiper->parallaxOptions['class'] );
        $this->assertEquals( 'custom-data-parallax-id', $swiper->parallaxOptions['data']['id'] );
    }

    public function testParallaxOptionsViaShorthandsHaveMorePriorityThanViaDirectAttributes()
    {
        $swiper = new Swiper( [
            'items'           => [
                'slide 01',
                'slide 02',
                'slide 03',
            ],
            'parallaxOptions' => [
                Swiper::PARALLAX_BACKGROUND   => 'http://lorempixel.com/900/600/nightlife/5/',
                Swiper::PARALLAX_TRANSITION   => '20%',
                Swiper::PARALLAX_TRANSITION_X => '20%',
                Swiper::PARALLAX_TRANSITION_Y => '20%',
                Swiper::PARALLAX_DURATION     => '500',
                'style'                       => 'color: #ffffff; background-image:url(http://lorempixel.com/900/600/nightlife/2/);',
                'data'                        => [
                    'swiper-parallax'          => '15%',
                    'swiper-parallax-x'        => '15%',
                    'swiper-parallax-y'        => '15%',
                    'swiper-parallax-duration' => '750',
                    'id'                       => 'custom-data-parallax-id'
                ],
                'id'                          => 'custom-parallax-id',
                'class'                       => 'custom-parallax-class custom-another-parallax-class',
            ]
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/5/', $swiper->parallaxOptions['background'] );
        $this->assertEquals( '20%', $swiper->parallaxOptions['transition'] );
        $this->assertEquals( '20%', $swiper->parallaxOptions['transitionX'] );
        $this->assertEquals( '20%', $swiper->parallaxOptions['transitionY'] );
        $this->assertEquals( '500', $swiper->parallaxOptions['duration'] );

        $this->assertEquals( 'color: #ffffff; background-image:url(http://lorempixel.com/900/600/nightlife/2/); background-image:url(http://lorempixel.com/900/600/nightlife/5/)',
            $swiper->parallaxOptions['style'] );
        $this->assertEquals( '20%', $swiper->parallaxOptions['data']['swiper-parallax'] );
        $this->assertEquals( '20%', $swiper->parallaxOptions['data']['swiper-parallax-x'] );
        $this->assertEquals( '20%', $swiper->parallaxOptions['data']['swiper-parallax-y'] );
        $this->assertEquals( '500', $swiper->parallaxOptions['data']['swiper-parallax-duration'] );

    }

}
