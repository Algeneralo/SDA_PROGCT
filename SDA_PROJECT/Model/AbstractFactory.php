<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:52 م
 */

namespace Model;

require_once 'BookModel\BasicBook.php';

abstract class AbstractFactory
{
    abstract function getBook($bookType);

    abstract function getProvider($providerType);
}