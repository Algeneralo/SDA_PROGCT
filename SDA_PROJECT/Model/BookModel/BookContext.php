<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:12 م
 */

namespace BookModel;


class BookContext
{
    private $BookStrategy;

    /**
     * BookContext constructor.
     * @param $BookStrategy
     */
    public function __construct(BookStrategy $BookStrategy = null)
    {
        $this->BookStrategy = $BookStrategy;
    }

    public function getBooks($searchValue = null)
    {
        return $this->BookStrategy->getBooks($searchValue);
    }

}