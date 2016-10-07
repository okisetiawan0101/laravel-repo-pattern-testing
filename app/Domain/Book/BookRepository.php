<?php
/**
 * Created by PhpStorm.
 * User: Oki
 * Date: 10/8/2016
 * Time: 1:41 AM
 */

namespace App\Domain\Book;


use App\Domain\Core\Exceptions\ResourceNotFoundException;
use App\Domain\Core\Models\Book;
use App\Domain\Core\Repositories\Repository;

class BookRepository extends Repository implements BookRepositoryInterface
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAllBooks()
    {
        return $this->book->with('bookCategory')->get();
    }

    public function getSpecificBook($bookId)
    {
        $response = $this->book->with('bookCategory')->find($bookId);

        if(!$response)
        {
            throw new ResourceNotFoundException("Book");
        }

        return $response;
    }

    public function storeBook(array $data)
    {
        $book = new Book();
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->book_category_id = $data['book_category_id'];
        $book->save();

        return $book;
    }

    public function updateBook($bookId, array $data)
    {
        $book = $this->book->with('bookCategory')->find($bookId);

        if(!$book)
        {
            throw new ResourceNotFoundException("Book");
        }

        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->book_category_id = $data['book_category_id'];
        $book->save();

        return $book;
    }

    public function destroyBook($bookId)
    {
        $book = $this->book->with('bookCategory')->find($bookId);

        if(!$book)
        {
            throw new ResourceNotFoundException("Book");
        }

        return $book->delete();
    }


}