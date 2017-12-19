<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:56 م
 */

namespace ProviderModel;

use Model\AbstractFactory;

require_once dirname(__FILE__) . '\../AbstractFactory.php';

class ProviderFactory extends AbstractFactory
{

    function getBook($bookType)
    {
        return null;
    }

    function getProvider($providerType)
    {
        $className = "ProviderModel\\" . $providerType;
        $ProviderClass = new \ReflectionClass($className);
        return $ProviderClass->newInstance();
    }
}