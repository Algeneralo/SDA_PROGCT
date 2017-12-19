<?php
/**
 * Created by PhpStorm.
 * User: Algeneral
 * Date: 12/2/2017
 * Time: 11:08 م
 */

namespace BookModel;


interface BookStrategy
{
    public function getBooks($searchValue);
}