<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:55 م
 */

namespace ProviderModel;

use ProviderModel\Provider;

require_once 'Provider.php';

class BasicProvider extends Provider
{

    /**
     * BasicProvider constructor.
     */
    public function __construct($id = null, $name = null, $address = null, $phoneNumber = null, $email = null)
    {
        parent::__construct($id, $name, $address, $phoneNumber, $email);
    }
}