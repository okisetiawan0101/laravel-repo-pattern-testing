<?php
/**
 * Created by PhpStorm.
 * User: Oki
 * Date: 10/8/2016
 * Time: 1:40 AM
 */

namespace App\Domain\Book;


use App\Domain\Core\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $response = $this->bookService->getAllBooks();

        return response()->json($response, Response::HTTP_OK);
    }

    public function show($bookId)
    {
        $response = $this->bookService->getSpecificBook($bookId);

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->only('title','author','book_category_id');

        $response = $this->bookService->storeBook($data);

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function update($bookId, Request $request)
    {
        $data = $request->only('title','author','book_category_id');

        $response = $this->bookService->updateBook($bookId, $data);

        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($bookId)
    {
        $this->bookService->destroyBook($bookId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}