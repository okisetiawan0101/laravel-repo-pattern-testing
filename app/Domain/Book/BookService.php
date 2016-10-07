<?php
/**
 * Created by PhpStorm.
 * User: Oki
 * Date: 10/8/2016
 * Time: 1:41 AM
 */

namespace App\Domain\Book;


use App\Domain\Core\Exceptions\ValidationException;
use App\Domain\Core\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookService extends Service implements BookServiceInterface
{
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    private function storeValidator (array $data){
        $validator = Validator::make($data,[
            "title" => "required",
            "author" => "required",
            "book_category_id" => "required|exists:book_categories,id",
        ]);

        return $validator;
    }

    private function updateValidator (array $data){
        $validator = Validator::make($data,[
            "title" => "required",
            "author" => "required",
            "book_category_id" => "required|exists:book_categories,id",
        ]);

        return $validator;
    }

    public function getAllBooks()
    {
        $response = $this->bookRepository->getAllBooks();

        return [self::KEY_DATA=>[self::KEY_ITEMS=>$response]];
    }

    public function getSpecificBook($bookId)
    {
        $response = $this->bookRepository->getSpecificBook($bookId);

        return [self::KEY_DATA=>$response];
    }

    public function storeBook(array $data)
    {
        $validator = $this->storeValidator($data);

        if($validator->fails()){
            throw new ValidationException($validator);
        }

        $response = DB::transaction(function() use ($data){
            $book = $this->bookRepository->storeBook($data);

            return $this->bookRepository->getSpecificBook($book->id);
        });

        return [self::KEY_DATA=>$response];
    }

    public function updateBook($bookId, array $data)
    {
        $validator = $this->updateValidator($data);

        if($validator->fails()){
            throw new ValidationException($validator);
        }

        $response = DB::transaction(function() use ($bookId, $data){
            $book = $this->bookRepository->updateBook($bookId, $data);

            return $this->bookRepository->getSpecificBook($book->id);
        });

        return [self::KEY_DATA=>$response];
    }

    public function destroyBook($bookId)
    {
        $response = DB::transaction(function() use ($bookId){
            $response = $this->bookRepository->destroyBook($bookId);

            return $response;
        });

        return $response;
    }


}