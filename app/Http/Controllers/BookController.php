<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Foundation\Application;

class BookController extends Controller
{
    public function index(Request $request): View|Factory|Application
    {
        $authorId = $request->get('author_id');

        $books = Book::query()->with('authors')
            ->when($authorId, function ($query) use ($authorId) {
                $query->whereHas('authors', function ($query) use ($authorId) {
                    $query->where('authors.id', $authorId);
                });
            })
            ->get();

        $authors = Author::query()->get();

        return view('books.index', [
            'books' => $books,
            'authors' => $authors,
            'authorId' => $authorId,
        ]);
    }
}
