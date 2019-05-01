<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Facades\Input;
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
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function callme($stop){
    //     echo "string".$stop;
        
    // }
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

    

     public function allgroups()
    {
        $id = Auth::user()->id ;
        $email = Auth::user()->email ;
        $data = [];
        // $data['groups']=\App\groups::all();
        

        
        $data['group_member']=DB::SELECT('select * FROM group_members WHERE user_id =?',[$id]);
        $data['group']=DB::SELECT('select * FROM groups');
        $data['invites']=DB::SELECT('select * FROM invites WHERE email =?',[$email]);


        return view('allgroups',$data);
    }


    public function updateimg(Request $request)
    {
         if($request->hasFile('prfimage')){

            $post_image=Input::file('prfimage');

            $filename=time().'.'.$post_image->getClientOriginalExtension();
        Image::make($post_image)->resize(500,500)->save(public_path('/img/avatar/'.$filename));

        $userid=Auth::User()->id;
        
        DB::update('update users set avatar = ? where id = ?',[$filename,$userid]);

         }
        return redirect()->back()->with('status',' successfully updated profile picture');
    }


public function updateuser(Request $request)
    {
            $name=Input::get('name');
            $sname=Input::get('sname');


            // $name=Input::file('prfimage');
            $userid=Auth::User()->id;

             DB::table('users')
            ->where('id', $userid)
            ->update(['name' => $name, 'sname'=>$sname]);


         
        return redirect()->back()->with('status',' successfully updated profile ');
    }

}
