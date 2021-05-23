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

    public function export($details)
    {
        $params = $details;
        $headers = [

            "Content-type" => "text/csv",
            "Content-Disposition"=> "attachment; filename=books.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",

        ];

        $callback = function() use ($details) {

            $books = Book::all();
            $file = fopen('php://output', 'w');

            if($details == 'authors'){
                fputcsv($file,['Authors']);

                //Body
                foreach($books as $book){
                    fputcsv($file,[$book->author]);
                }
              
            }elseif ($details =='titles') {
                fputcsv($file,['Title']);

                //Body
                foreach($books as $book){
                    fputcsv($file,[$book->title]);
                }
            }else{
                fputcsv($file,['ID', 'Title', 'Author', 'Description', 'Publisher', 'Genre']);

                //Body
                foreach($books as $book){
                    fputcsv($file,[$book->id, $book->title, $book->author, $book->description, $book->publisher, $book->genre ]);
                }
                
                fclose($file);

            }

          

        };

        return \Response::stream($callback, 200, $headers);


    }

}
