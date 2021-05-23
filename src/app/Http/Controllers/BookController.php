<?php

namespace App\Http\Controllers;
use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\BookCreateRequest;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate();

        return BookResource::collection($books);
    }

    public function show($id)
    {
        return new BookResource(Book::find($id));
    }

    public function store(BookCreateRequest $request)
    {
      
        $book = Book:: create($request->only('title', 'description', 'author', 'publisher', 'genre', 'image'));
            
        return response($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->update($request->only('title', 'description', 'author', 'publisher', 'genre', 'image'));

        return response($book, 201);

    }

    public function destroy($id)
    {
        Book::destroy($id);

        return response(null,  204);

    }

}
