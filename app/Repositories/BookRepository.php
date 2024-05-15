<?php

namespace App\Repositories;

use App\Models\Book;
use Prettus\Repository\Eloquent\Repository;

class BookRepository extends Repository
{
    protected $fieldSearchable = [
        'title',
        'summary',
        'authors.name'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Book::class;
    }
}
