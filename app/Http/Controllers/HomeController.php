<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id ;
        $data = [];
        $data['groups']=\App\groups::all();
        

        $data['group_member']=DB::SELECT('select * FROM group_members WHERE user_id =?',[$id]);


        return view('home',$data);
    }


    public function profile()
    {
        $id = Auth::user()->id ;
        $data = [];
        $data['groups']=\App\groups::all();
        

        $data['group_member']=DB::SELECT('select * FROM group_members WHERE user_id =?',[$id]);


        return view('profile',$data);
    }
}
