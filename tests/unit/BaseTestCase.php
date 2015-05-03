<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 02.05.2015
 * Time: 23:03
 */

namespace romkaChev\yii2\swiper\tests\unit;

use yii\console\Application;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        new Application( require( __DIR__ . '/config.php' ) );
    }
}