<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:16 م
 */

namespace Model;

use ProviderModel\ProviderContext;
use ProviderModel\ProviderFactory;
use BookModel\BookContext;
use BookModel\BookFactory;
use BookModel\BasicBook;

require_once 'DBConnection.php';
require_once 'DBOperation.php';
require_once 'ProviderModel/ProviderFactory.php';
require_once 'ProviderModel/ProviderContext.php';
require_once 'ProviderModel/getProviderByID.php';
require_once 'ProviderModel/getProviderByName.php';
require_once 'ProviderModel/getProviderAll.php';
require_once 'ProviderModel/BasicProvider.php';
require_once 'BookModel/BookFactory.php';
require_once 'BookModel/BookContext.php';
require_once 'BookModel/getBookByTitle.php';
require_once 'BookModel/getBookByISBN.php';
require_once 'BookModel/getBookAll.php';
require_once 'BookModel/BasicBook.php';


class FacadeModel
{
    private $DBConnection;
    private $providerFactory;
    private $bookFactory;
    private $DBOperation;
    private $providerContext;
    private $bookContext;

    /**
     * FacadeModel constructor.
     * @param $DBConnection
     * @param $providerFactory
     * @param $bookFactory
     * @param $DBOperation
     * @param $providerContext
     * @param $bookContext
     */
    public function __construct()
    {
        $this->DBConnection = DBConnection::getInstantce();
        $this->providerFactory = new ProviderFactory();
        $this->bookFactory = new BookFactory();
        $this->DBOperation = new DBOperation();
        $this->providerContext = new ProviderContext();
        $this->bookContext = new BookContext();
    }

    //book operation
    public function addBook($ISBN, $author, $title, $bookCount, $bookPrice, $bookType)
    {
        return $this->DBOperation->addBook($ISBN, $author, $title, $bookCount, $bookPrice, $bookType);
    }

    public function editBook($id, $ISBN, $author, $title, $bookCount, $bookPrice)
    {
        return $this->DBOperation->editBook($id, $ISBN, $author, $title, $bookCount, $bookPrice);
    }

    public function deleteBook($id)
    {
        return $this->DBOperation->deleteBook($id);
    }

    public function getBooks($searchKey, $searchValue = null)
    {
        $getBook = 'BookModel\getBook' . $searchKey;
        $this->bookContext = new BookContext(new $getBook);
        $BookArray = $this->bookContext->getBooks($searchValue);

        return $BookArray;
    }

    // provider operation
    public function addProvider($providerID, $name, $address, $phoneNumber, $email, $providerType)
    {
        return $this->DBOperation->addProvider($providerID, $name, $address, $phoneNumber, $email, $providerType);
    }

    public function editProvider($id, $providerID, $name, $address, $phoneNumber, $email)
    {
        return $this->DBOperation->editProvider($id, $providerID, $name, $address, $phoneNumber, $email);
    }

    public function deleteProvider($id)
    {
        return $this->DBOperation->deleteProvider($id);
    }

    public function getProviders($searchKey, $searchValue = null)
    {
        $getProvider = 'ProviderModel\getProvider' . $searchKey;
        $this->providerContext = new ProviderContext(new $getProvider);
        $ProvidersArray = $this->providerContext->getProviders($searchValue);
        return $ProvidersArray;
    }

    public function checkUser($email, $password)
    {
        return $this->DBOperation->checkUser($email, $password);
    }

    public function BuyBooks($bookArray)
    {
        return $this->DBOperation->BuyBooks($bookArray);
    }
}