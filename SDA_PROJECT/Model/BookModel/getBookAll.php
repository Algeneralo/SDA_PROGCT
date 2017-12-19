<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/3/2017
 * Time: 07:05 م
 */

namespace BookModel;

use Model\DBConnection;

require_once 'BookStrategy.php';
require_once dirname(__FILE__) . '\../DBConnection.php';

class getBookAll implements BookStrategy
{

    public function getBooks($searchValue)
    {
        $BooksArray = [[]];
        $Query = "SELECT * FROM books";

        $Instance = DBConnection::getInstantce();
        $connection = $Instance->getConnection();

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->execute();
            $counter = 0;
            $stmt->bind_result($id, $ISBN, $author, $title, $bookCount, $bookPrice);
            while ($stmt->fetch()) {
                $BooksArray[$counter][0] = $id;
                $BooksArray[$counter][1] = $ISBN;
                $BooksArray[$counter][2] = $author;
                $BooksArray[$counter][3] = $title;
                $BooksArray[$counter][4] = $bookCount;
                $BooksArray[$counter++][5] = $bookPrice;
            }


        }
        return $BooksArray;
    }
}