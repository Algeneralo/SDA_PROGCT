<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:53 م
 */

namespace ProviderModel;


class Provider
{
    private $providerID;
    private $name;
    private $address;
    private $phoneNumber;
    private $email;

    /**
     * Provider constructor.
     * @param $providerID
     * @param $name
     * @param $address
     * @param $phoneNumber
     * @param $email
     */
    public function __construct($providerID = null, $name = null, $address = null, $phoneNumber = null, $email = null)
    {
        $this->providerID = $providerID;
        $this->name = $name;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getProviderID()
    {
        return $this->providerID;
    }

    /**
     * @param null $providerID
     */
    public function setProviderID($providerID)
    {
        $this->providerID = $providerID;
    }


    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param null $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}