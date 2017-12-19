<?php

require 'Controller/Controller.php';
require 'Model/FacadeModel.php';

use Controller\Controller;
use \Model\FacadeModel;

session_start();
//session_destroy();
$controller = new Controller(new FacadeModel());


if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'yes') {//check if the user logged  in and he's the admin

    if (isset($_GET['action']) && $_GET['action'] != 'checkUser')
        $controller->$_GET['action']();
    else
        $controller->getView('StaffMainPage');


} elseif (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'no') {//check if the user logged  in and he's the user

    if (isset($_GET['action']) && $_GET['action'] != 'checkUser')
        $controller->$_GET['action']();
    else
        $controller->userMainPage();

} else {
    if (isset($_GET['action']) && $_GET['action'] == 'checkUser') {

        $_SESSION['error'] = '';//make session empty
        $isAdmin = $controller->checkUser();//get the user data if exist
        if ($isAdmin != null && $isAdmin == 'yes') {
            $_SESSION['isAdmin'] = 'yes';
            $controller->getView('StaffMainPage');
        } elseif ($isAdmin != null && $isAdmin == 'no') {
            $_SESSION['isAdmin'] = 'no';
            $controller->userMainPage();
        } else {
            $_SESSION['error'] = 'Sorry,please check yor data';
            $controller->getView('Login');
        }
    } else
        $controller->getView('Login');
}

?>