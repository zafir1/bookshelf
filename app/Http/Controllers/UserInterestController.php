<?php

namespace thebookshelf\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use thebookshelf\Interest;
use thebookshelf\UserInterest;

class UserInterestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Interest::where('id','>=',1)->orderBy('field')->get();
        $user_interest = Auth::user()->userInterest()->get()->pluck('interest_id')->toArray();
        return view('user.interest')->with('fields',$fields)->with('userInterest',$user_interest);
    }


    /**
     * Store a newly created interest in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = request()->validate([
            'field' => ['required','min:3','max:155'],
        ]);
        $attr = $attr+ ['user_id'=>Auth::id()];
        Interest::create($attr);
        return back()->with('success',$request->field.' has been added successfully.');
    }

    /**
     *
     * Submit users interest and returns back .
     *
     */
    
    public function submitInterest(Request $request)
    {
        $d = array();
        // $user_curr_interest = [];
        // foreach ($request->input('checkbox') as $data) {
        //     array_push($user_curr_interest,$data);
        // }

        // $userInterest = Auth::user()->userInterest();

        // $user_prev_interest= $userInterest->where('deleted',0)->get()->pluck('interest_id')->toArray();
        
        // $user_total_list = $userInterest->get()->pluck('interest_id')->toArray();

        // $new_rows = array_diff($user_curr_interest,$user_total_list);

        // $delete_rows = array_diff($user_prev_interest,$user_curr_interest);



        // dd($user_total_list,$user_curr_interest,$new_rows,$deleted);

        foreach ($request->input('checkbox') as $data) {
            $now = Carbon::now();
            $d[] = [
                    'user_id' => Auth::id(),
                    'interest_id' => $data,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
        }

        UserInterest::insert($d);
        return redirect('/home')->with('success','your interests has been recorded successfully.');
    }

    public function submitUserInterest(Request $request)
    {
        $d = array();
        foreach ($request->input('checkbox') as $data) {
            $now = Carbon::now();
            $d[] = [
                    'user_id' => Auth::id(),
                    'interest_id' => $data,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
        }
        $user_prev_interest = Auth::user()->userInterest()->get()->pluck('interest_id')->toArray();
        $user_curr_interest = $d;
        $deleted = array_diff($user_prev_interest, $user_curr_interest);


    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \thebookshelf\UserInterest  $userInterest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInterest $userInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \thebookshelf\UserInterest  $userInterest
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInterest $userInterest)
    {
        //
    }
}
