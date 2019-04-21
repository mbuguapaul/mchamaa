<?php

namespace App\Http\Controllers;
use DB;
// use App\User;
use App\invites;
use App\group_members;
use Illuminate\Http\Request;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;

class InvitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invite(Request $request)
    {
        $this->validate($request, [
            'role'=>'required|min:2|max:70',
            'email'=>'unique:users,email',
            'sname'=>'required',
            'phone' => 'min:12|required|regex:/(254)[0-9]{9}/',

            ]);
        $id = Input::get('groupid');

        $data=[];
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);

        return view('groupviews.dashboard',$data)->with('status','New group successfully created. You are by default the admin
        click add to add more members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invites  $invites
     * @return \Illuminate\Http\Response
     */
    public function show(invites $invites)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invites  $invites
     * @return \Illuminate\Http\Response
     */
    public function edit(invites $invites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invites  $invites
     * @return \Illuminate\Http\Response
     */
    public function linkjoin(Request $request)
    {

        $token = str_random();
         $invites = new invites;

             $invites->name = Input::get('name');
             $invites->sname = Input::get('sname');
             $invites->invitedgroup = Input::get('groupname');
             $invites->groupid = Input::get('groupid');
             $invites->phne_number = Input::get('phone');
             $invites->role = Input::get('role');
             $invites->email = Input::get('email');
            $invites->group_description = Input::get('description');
            $invites->token = $token;
             $invites->invite_by ="link";

            $invites->save();

            return redirect('home') ->with('status','Invitation request sent Kindly request the admin to confirm the request to allow you interact into the group');
    }

     public function confirm(Request $request)
    {
        
           
         $confirmid = Input::get('cid');

         $group_members = new group_members;
         $group_members->User_id = Input::get('userid');
         $group_members->group_id = Input::get('groupid');
         $group_members->user_level = Input::get('role');
         $group_members->save();

         DB::delete('delete from invites  where id = ?',[$confirmid]);

        return redirect()->back()->with('status','Member successfully confirmed');
        
    }


public function accept($token)
{
    // Look up the invite
    if (!$invites = Invites::where('token', $token)->first()) {
        //if the invite doesn't exist do something more graceful than this
        abort(404);
    }

    // create the user with the details from the invite
    // User::create([
    //     'email' => $invites->email,
    //     'name' => $invites->name,
    //     'sname' => $invites->sname,
    //     'phone' => $invites->phne_number,

    // ]);

    // delete the invite so it can't be used again
    // $invites->delete();

    // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
    if(Auth::user()){

    return redirect('home') ->with('status','you are already logged in please logout to login as the new user 

        ');
    }
    else{
         DB::update('update invites set confirmed = 1 where token = ?',[$token]);
        $data=[];
        $data['invites']=DB::SELECT('select * FROM invites WHERE token =?',[$token]);
         return view('invite.invitepass',$data);
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invites  $invites
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
{
    // validate the incoming request data
    $this->validate($request, [
           
            'email'=>'unique:users,email',
            'sname'=>'required',
            'phone' => 'unique:users,phone|min:10|required|regex:/(07)[0-9]{8}/',

            ]);

    do {
        //generate a random string using Laravel's str_random helper
        $token = str_random();
    } //check if the token already exists and if it does, try again
    while (Invites::where('token', $token)->first());

    //create a new invite record
    $invite = Invites::create([
        'invite_by' => Auth::user()->name,

        'name' => $request->get('fname'),
        'sname' => $request->get('sname'),
        'phne_number' => $request->get('phone'),
        'role' => $request->get('role'),
        'group_description' => $request->get('objectives'),
        'email' => $request->get('email'),
        'groupid' => $request->get('groupid'),
        'invitedgroup' => $request->get('groupname'),
        'token' => $token
    ]);

     $inviter = Auth::user()->name;
    // send the email
    Mail::to($request->get('email'))->send(new InviteCreated($invite,$inviter));

    // redirect back where we came from
    return redirect()
        ->back()->with('status','New successfully invited. Kindly remind them to check on email you used.');
}
}
