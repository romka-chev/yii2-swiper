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
}
