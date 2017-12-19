<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:49 م
 */

namespace BookModel;

require_once 'Book.php';
class BasicBook extends Book
{
    public function __construct($ISBN = null, $author = null, $title = null, $bookCount = null, $bookPrice = null)
    {
        parent::__construct($ISBN, $author, $title, $bookCount, $bookPrice);
    }
}