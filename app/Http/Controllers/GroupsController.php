<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use App\groups;
use App\group_members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function newgroup()
    {
        return view('newgroup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'group_name'=>'required|min:2|max:70',
            'description'=>'required|min:5',
            'contribution_amount' => 'required|integer|min:10',
            'contribution_frequency'=>'required',
            'pay_number' => 'min:10|required|regex:/(07)[0-9]{8}/',

            ]);

            $groups = new groups;

            $groups->group_name = Input::get('group_name');
            $groups->objectives = Input::get('description');
            $groups->amount = Input::get('contribution_amount');
            // $groups->penalty = Input::get('penalty');
            $groups->pay_number = Input::get('pay_number');
            $groups->period_of_contibution = Input::get('contribution_frequency');
            $groups->created_by =Auth::User()->id;

            $groups->save();
            
           

            $group_members = new group_members;

            // $group_members->group_name = Input::get('group_name');
            $group_members->User_id =Auth::User()->id;
            $group_members->group_id= $groups->id;
            $group_members->user_level=5;

            $group_members->save();
            
            

        return redirect('home') ->with('status','New group successfully created. You are by default the admin
        click add to add more members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function groupselect($id)
    {
        $userid = Auth::user()->id;
        $group_membership= count(DB::SELECT('select * FROM group_members WHERE group_id =? AND user_id =?',[$id,$userid]));
        if ($group_membership==0) {
            return redirect ('home') ->with('status','Unknown group or you do not exist there');;
        }
        else{
           
        $data=[];
         $data['users']=DB::SELECT('select * FROM users');
        $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
        $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);

         $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =?',[$userid]);

          $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);

        return view ('groupviews.dashboard',$data);
        }
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, groups $groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function members($id)
    {
      $userid = Auth::user()->id;
        $data=[];
         $data['users']=DB::SELECT('select * FROM users');
        $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
        $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);

         $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =?',[$userid]);

    $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);
        return view('groupviews.members',$data);
    }

     public function invites($id)
    {
      $userid = Auth::user()->id;
        $data=[];
         $data['users']=DB::SELECT('select * FROM users');
        $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
        $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);
        $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =?',[$userid]);

$data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);
        return view('groupviews.invites',$data);
    }







    public function deposits($id)
    {
      $userid = Auth::user()->id;
        $data=[];
         $data['users']=DB::SELECT('select * FROM users');
        $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
        $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);

         $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =?',[$userid]);

    $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);
        return view('groupviews.deposit',$data);
    }
}
