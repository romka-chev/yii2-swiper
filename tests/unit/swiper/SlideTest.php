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

    public function testConstructionFromMismatchArray()
    {
        $this->setExpectedException(
            'yii\base\UnknownPropertyException',
            'Setting unknown property'
        );

        /** @noinspection PhpUnusedLocalVariableInspection */
        $slide = new Slide( [ 'string content' ] );
    }

    public function testConstructionFromProperArray()
    {
        $slide = new Slide( [ 'content' => 'string content' ] );

        $this->assertEquals( 'string content', $slide->content );
    }

    public function testConstructionWithoutContent()
    {
        $slide = new Slide( [ ] );

        $this->assertEquals( null, $slide->content );
    }

    public function testSettingBackgroundProperty()
    {
        $slide = new Slide( [ 'background' => 'http://lorempixel.com/900/600/nightlife/2/' ] );

        $this->assertEquals( 'background-image:url(http://lorempixel.com/900/600/nightlife/2/)', $slide->options['style'] );
    }

    public function testSettingHashProperty()
    {
        $slide = new Slide( [ 'hash' => 'hash01' ] );

        $this->assertEquals( 'hash01', $slide->options['data']['hash'] );
    }

    public function testConstructionWithHtmlOptions()
    {
        $slide = new Slide( [
            'content' => 'string content',
            'options' => [
                'data' => [
                    'swiper-parallax' => 200
                ]
            ]
        ] );

        $this->assertEquals( 200, $slide->options['data']['swiper-parallax'] );
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
        $this->assertEquals( 'color: #FFFFFF;background-image:url(http://lorempixel.com/900/600/nightlife/1/)', $slide->options['style'] );

    }

}