<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:21 م
 */

namespace ProviderModel;


class ProviderContext
{
    private $providerStrategy;

    /**
     * ProviderContext constructor.
     * @param $providerStrategy
     */
    public function __construct(ProviderStrategy $providerStrategy = null)
    {
        $this->providerStrategy = $providerStrategy;
    }

    public function getProviders($searchValue)
    {
        return $this->providerStrategy->getProviders($searchValue);
    }

}