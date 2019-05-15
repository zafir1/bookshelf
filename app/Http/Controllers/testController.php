<?php

namespace thebookshelf\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class testController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function basic()
    {
        return view('user.basics',[
            'user' => Auth::user()->details
        ]);
    }
}
