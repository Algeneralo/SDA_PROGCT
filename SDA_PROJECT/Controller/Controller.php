<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/4/2017
 * Time: 06:48 م
 */

namespace Controller;


class Controller
{
    private $model;

    /**
     * Controller constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function checkUser()
    {
        $isAdmin = $this->model->checkUser($_POST['email'], $_POST['password']);
        return $isAdmin;
    }

    public function userMainPage()
    {
        $bookArray = $this->model->getBooks('All');
        $this->getView('UserMainPage', array('bookArray' => $bookArray));
    }

    public function getView($view, $attr = null)
    {
        if ($attr)
            extract($attr);
        include('View\\' . $view . '.php');
    }

    public function ManageBook()
    {
        $bookArray = $this->model->getBooks('All');
        $this->getView('ManageBook', array('bookArray' => $bookArray));
    }

    public function ManageProvider()
    {
        $providerArray = $this->model->getProviders('All');
        $this->getView('ManageProvider', array('providerArray' => $providerArray));
    }

    public function addBook()
    {
        if (isset($_POST['book_ISBN'])) {
            $status = $this->model->addBook($_POST['book_ISBN'], $_POST['book_author'],
                $_POST['book_title'], $_POST['book_count'], $_POST['book_price'], 'BasicBook');

            $bookArray = $this->model->getBooks('All');
            $this->getView('ManageBook', array('bookArray' => $bookArray, 'status' => $status,
                'messageSuccess' => 'Add Success', 'messageFailed' => 'Add failed! ,please try again'));
        } else {
            $this->getView('AddBookView');
        }

    }

    public function editBook()
    {
        $status = $this->model->editBook($_POST['edit_book_ID'], $_POST['edit_book_ISBN'], $_POST['edit_book_author'],
            $_POST['edit_book_title'], $_POST['edit_book_count'], $_POST['edit_book_price']);

        $bookArray = $this->model->getBooks('All');
        $this->getView('ManageBook', array('bookArray' => $bookArray, 'status' => $status,
            'messageSuccess' => 'Edit Success', 'messageFailed' => 'Edit failed! ,please check your data'));
    }

    public function deleteBook()
    {
        $status = $this->model->deleteBook($_POST['delete_book_ID']);

        $bookArray = $this->model->getBooks('All');
        $this->getView('ManageBook', array('bookArray' => $bookArray, 'status' => $status,
            'messageSuccess' => 'Delete Success', 'messageFailed' => 'Delete failed! ,please try again'));
    }


    public function addProvider()
    {
        if (isset($_POST['provider_ID'])) {
            $status = $this->model->addProvider($_POST['provider_ID'], $_POST['provider_name'],
                $_POST['provider_address'], $_POST['provider_phone'], $_POST['provider_email'], 'BasicProvider');

            $providerArray = $this->model->getProviders('All');
            $this->getView('ManageProvider', array('providerArray' => $providerArray, 'status' => $status,
                'messageSuccess' => 'Add Success', 'messageFailed' => 'Add failed! ,please try again'));
        } else {
            $this->getView('AddProviderView');
        }

    }

    public function editProvider()
    {
        $status = $this->model->editProvider($_POST['edit_ID_DB'], $_POST['edit_provider_ID'], $_POST['edit_provider_name'], $_POST['edit_provider_address'],
            $_POST['edit_provider_phone'], $_POST['edit_provider_email']);

        $providerArray = $this->model->getProviders('All');
        $this->getView('ManageProvider', array('providerArray' => $providerArray, 'status' => $status,
            'messageSuccess' => 'Edit Success', 'messageFailed' => 'Edit failed! ,please check your data'));
    }

    public function deleteProvider()
    {
        $status = $this->model->deleteProvider($_POST['delete_ID_DB']);
        $providerArray = $this->model->getProviders('All');
        $this->getView('ManageProvider', array('providerArray' => $providerArray, 'status' => $status,
            'messageSuccess' => 'Delete Success', 'messageFailed' => 'Delete failed! ,please try again'));
    }

    public function buyBooks()
    {
        $booksPurchased = explode(';', $_POST['booksPurchased']);
        $status = $this->model->BuyBooks($booksPurchased);
        $bookArray = $this->model->getBooks('All');
        $this->getView('UserMainPage', array('bookArray' => $bookArray, 'status' => $status,
            'messageSuccess' => 'Purchased Success', 'messageFailed' => 'Purchased failed! ,please try again'));
    }

    /**
     * @return mixed
     */
    public function bookSearch()
    {
        $bookArray = $this->model->getBooks($_POST['searchKey'], $_POST['searchValue']);
        $this->getView('bookSearchData', array('bookArray' => $bookArray));
    }

    public function providerSearch()
    {
        $providerArray = $this->model->getProviders($_POST['searchKey'], $_POST['searchValue']);
        $this->getView('providerSearchData', array('providerArray' => $providerArray));
    }

    public function back()
    {
        $this->getView($_GET['to']);
    }

    public function logout()
    {
        session_destroy();
        $this->getView('Login');
    }

}
