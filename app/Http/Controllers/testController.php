<?php

namespace thebookshelf\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use thebookshelf\College;
use thebookshelf\Department;
use thebookshelf\Details;
use thebookshelf\Location;

class testController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getBasicForm()
    {
        $college = College::where('id','>=',1)->orderBy('name')->get();
        $department = Department::where('id','>=',1)->orderBy('name')->get();
        $location = Location::where('id','>=',1)->orderBy('name')->get();

        return view('user.basics',[
            'user' => Auth::user()->details,
            'colleges' => $college,
            'departments' => $department,
            'locations' => $location,
        ]);
    }

    public function postBasicForm(Request $requset)
    {
        $attr = request()->validate([
            'college' => ['required'],
            'department' => ['required'],
            'location' => ['required'],
            'contact' => ['required','digits:10'],
        ]);
        $attr = $attr + ['user_id'=>Auth::id()];
        Details::create($attr);
        return redirect('/home');
    }
}
