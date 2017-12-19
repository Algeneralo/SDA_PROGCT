<?php

use Model\FacadeModel;
require_once dirname(__FILE__) . '\../Model\AbstractFactory.php';
require_once dirname(__FILE__) . '\../Model\FacadeModel.php';
class testLogin extends PHPUnit_Framework_TestCase
{
    public function testMyObject()
    {
        $expected = 'no';
        $actual = (new FacadeModel())->checkUser('user@hotmail.com','user123');

        $this->assertEquals($expected, $actual);
    }
}