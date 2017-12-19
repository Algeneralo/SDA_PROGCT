<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/11/2017
 * Time: 04:02 م
 */
use Model\FacadeModel;
require_once dirname(__FILE__) . '\../Model\AbstractFactory.php';
require_once dirname(__FILE__) . '\../Model\FacadeModel.php';
class Test extends PHPUnit_Framework_TestCase
{
    public function testMyObject()
    {
        $expected = 1;
        $actual = (new FacadeModel())->deleteBook(10);

        $this->assertEquals($expected, $actual);
    }
}
