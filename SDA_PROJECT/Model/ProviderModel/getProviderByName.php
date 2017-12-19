<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:16 م
 */

namespace ProviderModel;

use Model\DBConnection;

require_once 'ProviderStrategy.php';
require_once dirname(__FILE__) . '\../DBConnection.php';
class getProviderByName implements ProviderStrategy
{

    function getProviders($searchValue)
    {
        $ProvidersArray = [[]];
        $Query = "SELECT * FROM providers WHERE name=?";

        $Instance = DBConnection::getInstantce();
        $connection = $Instance->getConnection();

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('s', $searchValue);
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