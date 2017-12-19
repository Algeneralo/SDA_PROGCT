<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:51 م
 */

namespace BookModel;

use Model\AbstractFactory;

require_once dirname(__FILE__) . '\../AbstractFactory.php';

class BookFactory extends AbstractFactory
{
    public function getBook($bookType)
    {
        $className = "BookModel\\" . $bookType;
        $BookClass = new \ReflectionClass($className);
        return $BookClass->newInstance();
    }

    public function getProvider($providerType)
    {
        return null;
    }
}