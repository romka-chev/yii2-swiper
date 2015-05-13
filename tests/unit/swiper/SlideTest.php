<?php
namespace romkaChev\yii2\swiper\tests\unit\swiper;


use romkaChev\yii2\swiper\Slide;
use romkaChev\yii2\swiper\tests\unit\BaseTestCase;

class SlideTest extends BaseTestCase
{

    public function testConstructionFromString()
    {
        $slide = new Slide( 'string content' );

        $this->assertEquals( 'string content', $slide->content );

    }

    public function testConstructionFromArray()
    {
        $slide = new Slide( [ 'content' => 'string content' ] );

        $this->assertEquals( 'string content', $slide->content );
    }

    public function testConstructionFromContentArray()
    {
        $slide = new Slide( [
            'content' => [
                'content 1, ',
                'content 2, ',
                'content 3'
            ]
        ] );

        $this->assertEquals( 'content 1, content 2, content 3', $slide->content );
    }

    public function testConstructionFromMismatchArray()
    {
        $this->setExpectedException(
            'yii\base\UnknownPropertyException',
            'Setting unknown property'
        );

        /** @noinspection PhpUnusedLocalVariableInspection */
        $slide = new Slide( [ 'string content' ] );
    }

    public function testConstructionWithoutContent()
    {
        $slide = new Slide( [ ] );

        $this->assertSame( null, $slide->content );
    }

    public function testConstructionWithShorthands()
    {
        $slide = new Slide( [
            'content'    => 'slide content',
            'background' => 'http://lorempixel.com/900/600/nightlife/2/',
            'hash'       => 'slide00'
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/2/', $slide->background );
        $this->assertEquals( 'slide00', $slide->hash );

        $this->assertEquals( 'background-image:url(http://lorempixel.com/900/600/nightlife/2/)', $slide->options['style'] );
        $this->assertEquals( 'slide00', $slide->options['data']['hash'] );
    }

    public function testConstructionWithDirectAttributes()
    {
        $slide = new Slide( [
            'content' => 'slide content',
            'options' => [
                'style' => 'background-image:url(http://lorempixel.com/900/600/nightlife/2/)',
                'data'  => [
                    'hash' => 'slide00'
                ]
            ],
        ] );

        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/2/', $slide->background );
        $this->assertEquals( 'slide00', $slide->hash );

        $this->assertEquals( 'background-image:url(http://lorempixel.com/900/600/nightlife/2/)', $slide->options['style'] );
        $this->assertEquals( 'slide00', $slide->options['data']['hash'] );
    }

    public function testOptionsSpecifiedViaShorthandsHaveMorePriorityThanDirectlySpecified()
    {
        $slide = new Slide( [
            'content'    => 'slide content',
            'options'    => [
                'style' => 'background-image:url(http://placehold.it/800x600)',
                'data'  => [
                    'hash' => 'slide00'
                ]
            ],
            'background' => 'http://placehold.it/1920x1080',
            'hash'       => 'slide11'
        ] );

        $this->assertEquals( 'http://placehold.it/1920x1080', $slide->background );
        $this->assertEquals( 'slide11', $slide->hash );

        $this->assertEquals( 'background-image:url(http://placehold.it/800x600); background-image:url(http://placehold.it/1920x1080)', $slide->options['style'] );
        $this->assertEquals( 'slide11', $slide->options['data']['hash'] );
    }

    public function testParsingBackground()
    {

        $slide = new Slide( [
            'content' => 'slide content',
            'options' => [
                'style' => 'background-image:url(http://placehold.it/800x600)',
            ]
        ] );

        $this->assertEquals( 'http://placehold.it/800x600', $slide->background );

        $slide = new Slide( [
            'content' => 'slide content',
            'options' => [
                'style' => '  background :   url( http://placehold.it/800x600 ); ',
            ]
        ] );

        $this->assertEquals( 'http://placehold.it/800x600', $slide->background );
    }

    public function testComplex()
    {
        $slide = new Slide( [
            'content'    => 'slide 1',
            'hash'       => 'slide01',
            'background' => 'http://lorempixel.com/900/600/nightlife/1/',
            'options'    => [
                'style' => 'color: #FFFFFF',
                'data'  => [
                    'id' => 'test-id'
                ]
            ]
        ] );

        $this->assertEquals( 'slide 1', $slide->content );
        $this->assertEquals( 'slide01', $slide->hash );
        $this->assertEquals( 'http://lorempixel.com/900/600/nightlife/1/', $slide->background );

        $this->assertEquals( 'slide01', $slide->options['data']['hash'] );
        $this->assertEquals( 'test-id', $slide->options['data']['id'] );
        $this->assertEquals( 'color: #FFFFFF; background-image:url(http://lorempixel.com/900/600/nightlife/1/)', $slide->options['style'] );

    }

}