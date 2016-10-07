<?php
/**
 * Created by PhpStorm.
 * User: Oki
 * Date: 10/8/2016
 * Time: 1:41 AM
 */

namespace App\Domain\Book;


interface BookServiceInterface
{
    public function getAllBooks();
    public function getSpecificBook($bookId);
    public function storeBook(array $data);
    public function updateBook($bookId, array $data);
    public function destroyBook($bookId);
}