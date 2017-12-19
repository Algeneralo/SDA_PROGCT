<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:00 م
 */

namespace Model;

use BookModel\BookFactory;
use ProviderModel\ProviderFactory;


require_once 'DBConnection.php';
require_once 'BookModel\BookFactory.php';

class DBOperation
{
    private $Instance;

    public function addBook($ISBN, $author, $title, $bookCount, $bookPrice, $bookType)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();
        $Query = "INSERT INTO books (ISBN,author ,title,bookCount,bookPrice) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($Query);
        $bookObject = (new BookFactory())->getBook($bookType);
        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {

            $bookObject->setISBN($ISBN);
            $bookObject->setAuthor($author);
            $bookObject->setTitle($title);
            $bookObject->setBookCount($bookCount);
            $bookObject->setBookPrice($bookPrice);

            $ISBN_object = $bookObject->getISBN();
            $author_object = $bookObject->getAuthor();
            $title_object = $bookObject->getTitle();
            $bookCount_object = $bookObject->getBookCount();
            $bookPrice_object = $bookObject->getBookPrice();


            $stmt->bind_param('issid', $ISBN_object, $author_object, $title_object, $bookCount_object, $bookPrice_object);
            $status = $stmt->execute();
        }
        return $status;
    }

    public function editBook($id, $ISBN, $author, $title, $bookCount, $bookPrice)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();
        $Query = "UPDATE books SET ISBN=?,author=?,title=?,bookCount=?,bookPrice=? WHERE id=?";

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('issidi', $ISBN, $author, $title, $bookCount, $bookPrice, $id);
            $status = $stmt->execute();

        }
        return $status;
    }

    public function deleteBook($id)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();
        $Query = "DELETE FROM books WHERE id=?";

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('i', $id);
            $status = $stmt->execute();
        }
        return $status;
    }

    public function addProvider($providerID, $name, $address, $phoneNumber, $email, $providerType)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();
        $Query = "INSERT INTO providers (providerID,name ,address,phoneNumber,email) VALUES (?, ?, ?, ?, ?)";

        $stmt = $connection->prepare($Query);

        $providerObject = (new ProviderFactory())->getProvider($providerType);
        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {

            $providerObject->setProviderID($providerID);
            $providerObject->setName($name);
            $providerObject->setAddress($address);
            $providerObject->setPhoneNumber($phoneNumber);
            $providerObject->setEmail($email);

            $providerID_object = $providerObject->getProviderID();
            $name_object = $providerObject->getName();
            $address_object = $providerObject->getAddress();
            $phoneNumber_object = $providerObject->getPhoneNumber();
            $email_object = $providerObject->getEmail();

            $stmt->bind_param('issss', $providerID_object, $name_object, $address_object, $phoneNumber_object, $email_object);
            $status = $stmt->execute();
        }
        return $status;
    }

    public function editProvider($id, $providerID, $name, $address, $phoneNumber, $email)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();
        $Query = "UPDATE providers SET providerID=?,name=?,address=?,phoneNumber=?,email=? WHERE id=?";

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('issssi', $providerID, $name, $address, $phoneNumber, $email, $id);
            $status = $stmt->execute();
        }
        return $status;
    }

    public function deleteProvider($id)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();
        $Query = "DELETE FROM providers WHERE id=?";

        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('i', $id);
            $status = $stmt->execute();
        }
        return $status;
    }

    public function checkUser($email, $password)
    {
        $isAdmin = null;
        $Query = "SELECT isAdmin FROM users WHERE email=? and password=?";

        $Instance = DBConnection::getInstantce();
        $connection = $Instance->getConnection();
        $stmt = $connection->prepare($Query);

        if (!$stmt) {
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        } else {
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $stmt->bind_result($isAdmin);
            $stmt->fetch();
        }
        return $isAdmin;
    }

    public function BuyBooks($bookArray)
    {
        $status = '';
        $this->Instance = DBConnection::getInstantce();
        $connection = $this->Instance->getConnection();

        for ($counter = 0; $counter < count($bookArray) - 1; $counter++) {
            $bookID = explode(",", $bookArray[$counter])[0];
            $purchases_book_count = explode(",", $bookArray[$counter])[1];
            $old_book_count = explode(",", $bookArray[$counter])[3];
            $new_book_count = $old_book_count - $purchases_book_count;

            $Query = "UPDATE books SET bookCount=? WHERE id=?";
            $stmt = $connection->prepare($Query);
            $stmt->bind_param('ii', $new_book_count, $bookID);
            $status = $stmt->execute();
        }

        return $status;
    }
}