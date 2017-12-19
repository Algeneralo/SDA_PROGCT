<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:09 م
 */

namespace BookModel;

use Model\DBConnection;

require_once 'BookStrategy.php';
require_once dirname(__FILE__) . '\../DBConnection.php';

class getBookByISBN implements BookStrategy
{
    function getBooks($searchValue)
    {

        $BooksArray = [[]];
        $Query = "SELECT * FROM books WHERE ISBN=?";

        $Instance = DBConnection::getInstantce();
        $connection = $Instance->getConnection();

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('i', $searchValue);
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