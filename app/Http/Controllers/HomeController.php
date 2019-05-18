<?php

namespace thebookshelf\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use thebookshelf\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('starter');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        return view('home',[
            'books' => $books,
            'device' => 'md',
            'size' => '6'
        ]);
    }

    
}
