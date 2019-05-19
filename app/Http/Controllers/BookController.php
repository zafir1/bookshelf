<?php

namespace thebookshelf\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use thebookshelf\Book;
use thebookshelf\Book_field;
use thebookshelf\Interest;
use thebookshelf\User;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Interest::where('id','>=',1)->orderBy('field')->get();
        return view('books.create')->with('fields',$fields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = request()->validate([
            'name' => ['required','min:5','max:195','regex:/^[\pL\s\-]+$/u'],
            'author' => ['required','min:3','max:195'],
            'publication' => ['required','min:3','max:195'],
            'edition' => ['required','min:3','max:195'],
            'price' => ['required','max:50000','numeric'],
            'checkbox' => ['required','min:3'],
        ]);
        $attr = $attr + ['user_id'=>Auth::id()];
        $book_id = Book::create($attr)->id;
        $this->createBookField($request,$book_id);
        return redirect('book_details/'.$book_id.'/add')->with('success',"Your Book has beed added successfully. Please write something about book");
        // return redirect('home')->with('success','Your Book has been added successfully.');
    }

    public function createDetail($id)
    {
        dd($id);
    }

    public function storeDetail(Request $request)
    {
        dd($request->details);
    }

    private function createBookField(Request $request,$book_id)
    {
        $d = array();
        foreach ($request->input('checkbox') as $field) {
            $now = Carbon::now();
            $d[] = [
                    'book_id' => $book_id,
                    'field_id' => $field,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
        }
        Book_field::insert($d);
    }

    private function saveBook()
    {
        # code...
    }

    /**
     *
     * Search Books
     *
     */
    public function Search(Request $request)
    {
        $books = Book::where('name','LIKE','%'.$request->search.'%')
                    ->orWhere('author','LIKE','%'.$request->search.'%')
                    ->orWhere('publication','LIKE','%'.$request->search.'%')
                    ->orWhere('publication','LIKE','%'.$request->search.'%')
                    ->get();
        if(!$books->count()){
            return redirect('/home')->with('info',"Sorry! we couldn't found any result for ".$request->search);
        }
        return view('home',[
            'device' => 'md',
            'size' => '6',
            'books' => $books,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $seller = User::findOrFail($book->user_id);
        dd($seller,$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
