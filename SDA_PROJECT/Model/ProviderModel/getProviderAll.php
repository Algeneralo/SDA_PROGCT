<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/3/2017
 * Time: 07:09 م
 */

namespace ProviderModel;

use Model\DBConnection;

require_once 'ProviderStrategy.php';

require_once dirname(__FILE__) . '\../DBConnection.php';
class getProviderAll implements ProviderStrategy
{

    function getProviders($searchValue)
    {
        $ProvidersArray = [[]];
        $Query = "SELECT * FROM providers";

        $Instance = DBConnection::getInstantce();
        $connection = $Instance->getConnection();

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->execute();
            $counter = 0;
            $stmt->bind_result($id, $providerID, $name, $address, $phoneNumber, $email);
            while ($stmt->fetch()) {
                $ProvidersArray[$counter][0] = $id;
                $ProvidersArray[$counter][1] = $providerID;
                $ProvidersArray[$counter][2] = $name;
                $ProvidersArray[$counter][3] = $address;
                $ProvidersArray[$counter][4] = $phoneNumber;
                $ProvidersArray[$counter++][5] = $email;
            }


        }
        return $ProvidersArray;
    }
}