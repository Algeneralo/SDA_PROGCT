<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:14 م
 */

namespace ProviderModel;


interface ProviderStrategy
{
    function getProviders($searchValue);
}