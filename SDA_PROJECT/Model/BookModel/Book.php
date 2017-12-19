<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 10:46 م
 */

namespace BookModel;


class Book
{
    private $ISBN;
    private $author;
    private $title;
    private $bookCount;
    private $bookPrice;

    /**
     * Book constructor.
     * @param $ISBN
     * @param $author
     * @param $title
     * @param $bookCount
     * @param $bookPrice
     */
    public function __construct($ISBN = null, $author = null, $title = null, $bookCount = null, $bookPrice = null)
    {
        $this->ISBN = $ISBN;
        $this->author = $author;
        $this->title = $title;
        $this->bookCount = $bookCount;
        $this->bookPrice = $bookPrice;
    }

    /**
     * @return null
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param null $ISBN
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @return null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param null $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getBookCount()
    {
        return $this->bookCount;
    }

    /**
     * @param null $bookCount
     */
    public function setBookCount($bookCount)
    {
        $this->bookCount = $bookCount;
    }

    /**
     * @return null
     */
    public function getBookPrice()
    {
        return $this->bookPrice;
    }

    /**
     * @param null $bookPrice
     */
    public function setBookPrice($bookPrice)
    {
        $this->bookPrice = $bookPrice;
    }

}