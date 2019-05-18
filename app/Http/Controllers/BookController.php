<?php

namespace thebookshelf\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use thebookshelf\Book;
use thebookshelf\Book_field;
use thebookshelf\Interest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
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
        return redirect('home')->with('success','Your Book has been added successfully.');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
