<?php

namespace App\Service;

use App\Models\Author;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Transform\BookTransform;

class BookService
{
    /** @var BookRepository $bookRepository */
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /** @param string $query */
    public function searchBook($query, $page = 1, $limit = 10)
    {
        if($query) {
            return BookTransform::collection(Book::search("title:$query OR summary:$query OR authors.name:$query OR publisher.name:$query")->paginate($limit));
        }

        return BookTransform::collection(Book::search()->paginate($limit));
    }
}
