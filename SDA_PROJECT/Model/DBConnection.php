<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:58 م
 */

namespace Model;


class DBConnection
{
    private static $instance;
    private $connection;
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $DBName = "sdaproject";

    private function __construct()
    {
        $this->connection = new \mysqli($this->serverName, $this->userName, $this->password, $this->DBName);
        if (mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . \mysqli_connect_error(), E_USER_ERROR);
        }
    }

    static function getInstantce()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        if (!self::$instance) {
            echo 'asdadsdsds';
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}