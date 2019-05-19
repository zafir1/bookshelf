<?php

namespace thebookshelf\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use thebookshelf\Book;
use thebookshelf\BookDetail;

class BookDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAdd($id)
    {
        $book = Book::findOrFail($id);
        abort_if(($book->user_id != Auth::id()),403);
        abort_if(($book->detailsCompleted() == true),403);
        
        return view('books.details.create',[
            'id' => $id,
            'book' =>$book,
        ]);
    }
    public function postAdd(Request $request)
    {
        $book = Book::findOrFail($request->id);
        abort_if(($book->user_id != Auth::id()),403);
        $attr =  request()->validate([
            'description' => ['required'],
        ]);

        $attr = $attr + ['book_id' => $book->id];
        BookDetail::create($attr);
        return redirect('/home')->with('success','Your book has been successfully added.');

    }
    
}
