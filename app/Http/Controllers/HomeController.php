<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function insertDep(Request $request)
    {   
        $this->validate($request,$this->depRules());
        $data = $request->all();
        Department::create($data);
        Session::flash('msg','Department added successfully');
        return redirect()->route('admin.createDep');


    }

    public function depRules()
    {
        return $rules = array('history' => 'required|string',
            'mission'                       => 'required|string',
            'vision'                        => 'required|string',
        );
    }
}
