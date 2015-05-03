<?php
namespace romkaChev\yii2\swiper\tests\unit\swiper;


class SwiperDemosTest extends \PHPUnit_Framework_TestCase
{

    public function test01Default()
    {
        \Yii::$app->view->renderFile( '@demos/01-default.php' );
    }

    public function test02Responsive()
    {
        \Yii::$app->view->renderFile( '@demos/02-responsive.php' );
    }

    public function test03Vertical()
    {
        \Yii::$app->view->renderFile( '@demos/03-vertical.php' );
    }

    public function test04SpaceBetween()
    {
        \Yii::$app->view->renderFile( '@demos/04-space-between.php' );
    }

    public function test05SlidesPerView()
    {
        \Yii::$app->view->renderFile( '@demos/05-slides-per-view.php' );
    }

    public function test06SlidesPerViewAuto()
    {
        \Yii::$app->view->renderFile( '@demos/06-slides-per-view-auto.php' );
    }

    public function test07Centered()
    {
        \Yii::$app->view->renderFile( '@demos/07-centered.php' );
    }

    public function test08CenteredAuto()
    {
        \Yii::$app->view->renderFile( '@demos/08-centered-auto.php' );
    }

    public function test09Freemode()
    {
        \Yii::$app->view->renderFile( '@demos/09-freemode.php' );
    }

    public function test10SlidesPerColumn()
    {
        \Yii::$app->view->renderFile( '@demos/10-slides-per-column.php' );
    }

    public function test11Nested()
    {
        \Yii::$app->view->renderFile( '@demos/11-nested.php' );
    }

    public function test12GrabCursor()
    {
        \Yii::$app->view->renderFile( '@demos/12-grab-cursor.php' );
    }

    public function test13Scrollbar()
    {
        \Yii::$app->view->renderFile( '@demos/13-scrollbar.php' );
    }

    public function test14NavArrows()
    {
        \Yii::$app->view->renderFile( '@demos/14-nav-arrows.php' );
    }

    public function test15InfiniteLoop()
    {
        \Yii::$app->view->renderFile( '@demos/15-infinite-loop.php' );
    }

    public function test16EffectFade()
    {
        \Yii::$app->view->renderFile( '@demos/16-effect-fade.php' );
    }

    public function test17EffectCube()
    {
        \Yii::$app->view->renderFile( '@demos/17-effect-cube.php' );
    }

    public function test18EffectCoverflow()
    {
        \Yii::$app->view->renderFile( '@demos/18-effect-coverflow.php' );
    }

    public function test19KeyboardControl()
    {
        \Yii::$app->view->renderFile( '@demos/19-keyboard-control.php' );
    }

    public function test20MousewheelControl()
    {
        \Yii::$app->view->renderFile( '@demos/20-mousewheel-control.php' );
    }

    public function test21Autoplay()
    {
        \Yii::$app->view->renderFile( '@demos/21-autoplay.php' );
    }

    public function test22DynamicSlides()
    {
        \Yii::$app->view->renderFile( '@demos/22-dynamic-slides.php' );
    }

    public function test23ThumbsGallery()
    {
        \Yii::$app->view->renderFile( '@demos/23-thumbs-gallery.php' );
    }

    public function test24MultipleSwipers()
    {
        \Yii::$app->view->renderFile( '@demos/24-multiple-swipers.php' );
    }

    public function test25HashNavigation()
    {
        \Yii::$app->view->renderFile( '@demos/25-hash-navigation.php' );
    }

    public function test26Rtl()
    {
        \Yii::$app->view->renderFile( '@demos/26-rtl.php' );
    }

    public function test27Jquery()
    {
        \Yii::$app->view->renderFile( '@demos/27-jquery.php' );
    }

    public function test28Parallax()
    {
        \Yii::$app->view->renderFile( '@demos/28-parallax.php' );
    }

    public function test29CustomPagination()
    {
        \Yii::$app->view->renderFile( '@demos/29-custom-pagination.php' );
    }

    public function test30LazyLoadImages()
    {
        \Yii::$app->view->renderFile( '@demos/30-lazy-load-images.php' );
    }

    public function test31CustomPlugin()
    {
        \Yii::$app->view->renderFile( '@demos/31-custom-plugin.php' );
    }

    public function test32ScrollContainer()
    {
        \Yii::$app->view->renderFile( '@demos/32-scroll-container.php' );
    }

    public function testComplex()
    {
        \Yii::$app->view->renderFile( '@demos/complex.php' );
    }

}