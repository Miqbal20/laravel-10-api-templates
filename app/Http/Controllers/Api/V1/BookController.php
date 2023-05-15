<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\V1\BookCollection;
use App\Http\Resources\V1\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return new BookCollection(Book::paginate(10));
    }

    public function show(Book $book){
        return new BookResource($book);
    }

    public function store(BookRequest $request){
        Book::create($request->validated());
        return response()->json('Books Created');
    }

    public function update(BookRequest $request, Book $book){
        $book->update($request->validated());
        return response()->json('Data Updated');
    }

    public function destroy(Book $book){
        $book->delete();
        return response()->json('Data Deleted');
    }
}
