<?php

namespace App\Http\Controllers;
use App\User;
use App\withdraws;
use DB;
use App\payment_processing;

use App\groups;
use App\group_members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use \Carbon\Carbon;
use App\Charts\analysis;
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


            $today = payment_processing::whereDate('created_at', today())->count();
        $yesterday = payment_processing::whereDate('created_at', today()->subDays(1))->count();
        $twodays = payment_processing::whereDate('created_at', today()->subDays(2))->count();
        $threedays = payment_processing::whereDate('created_at', today()->subDays(3))->count();
        $fourdays = payment_processing::whereDate('created_at', today()->subDays(4))->count();
        $fivedays = payment_processing::whereDate('created_at', today()->subDays(5))->count();
        $sixdays = payment_processing::whereDate('created_at', today()->subDays(6))->count();
        $svendays = payment_processing::whereDate('created_at', today()->subDays(7))->count();

        $chart = new analysis;
        $chart->labels(['7 days ago', '6 days ago', '5 days ago','4 days ago','3 days ago','Yesterday','today']);
        $chart->dataset('Deposits', 'line', collect([$svendays, $sixdays, $fivedays,$fourdays,$twodays,$yesterday,$today]));
           
        $data=[];
         $data['users']=DB::SELECT('select * FROM users');
        $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
        $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);

         $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =? AND group_id = ?',[$userid,$id]);

          $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);

          $data['withdraws']=DB::SELECT('select * FROM withdraws WHERE group_id =?',[$id]);

          $timet=Carbon::now()->subMinutes(10);
          $data['logg']=DB::SELECT('select * FROM payment_processings WHERE group_id =? AND created_at > ?',[$id,$timet]);


$data['lchats']=DB::SELECT('select * FROM chats WHERE group_id =? AND created_at > ?',[$id,$timet]);


$data['withh']=DB::SELECT('select * FROM withdraws WHERE group_id =? AND created_at > ?',[$id,$timet]);
// ->where('created_at', '<', Carbon::now()->subMinutes(5)->toDateTimeString())
        return view ('groupviews.dashboard',['chart' => $chart],$data);
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

         $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =? AND group_id = ?',[$userid,$id]);

         $data['withdraws']=DB::SELECT('select * FROM withdraws WHERE group_id =?',[$id]);
        $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);

        $timet=Carbon::now()->subMinutes(10);
          $data['logg']=DB::SELECT('select * FROM payment_processings WHERE group_id =? AND created_at > ?',[$id,$timet]);
        $data['withh']=DB::SELECT('select * FROM withdraws WHERE group_id =? AND created_at > ?',[$id,$timet]);
        $data['lchats']=DB::SELECT('select * FROM chats WHERE group_id =? AND created_at > ?',[$id,$timet]);
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
           $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =? AND group_id = ?',[$userid,$id]);

            $data['withdraws']=DB::SELECT('select * FROM withdraws WHERE group_id =?',[$id]);
            $timet=Carbon::now()->subMinutes(10);
              $data['logg']=DB::SELECT('select * FROM payment_processings WHERE group_id =? AND created_at > ?',[$id,$timet]);
            $data['withh']=DB::SELECT('select * FROM withdraws WHERE group_id =? AND created_at > ?',[$id,$timet]);

            $data['lchats']=DB::SELECT('select * FROM chats WHERE group_id =? AND created_at > ?',[$id,$timet]);

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
            $data['withdraws']=DB::SELECT('select * FROM withdraws WHERE group_id =?',[$id]);


             $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =? AND group_id = ?',[$userid,$id]);

              $timet=Carbon::now()->subMinutes(10);
              $data['logg']=DB::SELECT('select * FROM payment_processings WHERE group_id =? AND created_at > ?',[$id,$timet]);
$data['lchats']=DB::SELECT('select * FROM chats WHERE group_id =? AND created_at > ?',[$id,$timet]);

            $data['withh']=DB::SELECT('select * FROM withdraws WHERE group_id =? AND created_at > ?',[$id,$timet]);
            $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);
        return view('groupviews.deposit',$data);
    }



 public function withdraws($id)
    {
      $userid = Auth::user()->id;
            $data=[];
             $data['users']=DB::SELECT('select * FROM users');
            $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
            $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
            $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
            $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);
            $data['withdraws']=DB::SELECT('select * FROM withdraws WHERE group_id =?',[$id]);


             $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =? AND group_id = ?',[$userid,$id]);

              $timet=Carbon::now()->subMinutes(10);
              $data['logg']=DB::SELECT('select * FROM payment_processings WHERE group_id =? AND created_at > ?',[$id,$timet]);
$data['lchats']=DB::SELECT('select * FROM chats WHERE group_id =? AND created_at > ?',[$id,$timet]);

            $data['withh']=DB::SELECT('select * FROM withdraws WHERE group_id =? AND created_at > ?',[$id,$timet]);
            $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);
        return view('groupviews.withdraws',$data);
    }



    public function withdraw(Request $request)
    {
        $groupid=Input::get('groupid');

        $worti = groups::where('id',$groupid)->first();
        $maxamount=$worti->worth;
         
        $worth=Input::get('worth');
        $this->validate($request, [
            'amount'=>'required|numeric|min:10|max:'.$maxamount,
            'Description'=>'required',
            

            ]);
        $userid = Auth::user()->id;
        $amount=Input::get('amount');
        $withdraws = new withdraws;

            $withdraws->amount = Input::get('amount');
            $withdraws->description = Input::get('Description');
            $withdraws->user_id = $userid;
            // $groups->penalty = Input::get('penalty');
            $withdraws->group_id = Input::get('groupid');
         

            $withdraws->save();

            
            $newworth=$maxamount - $amount;
            DB::table('groups')
            ->where('id', $groupid)
            ->update(['worth' => $newworth]);

            return redirect()->back() ->with('status','Confirmed you have withdrawn Ksh '.$amount );

    }

  public function analysis()
    {



        $today = payment_processing::whereDate('created_at', today())->count();
        $yesterday = payment_processing::whereDate('created_at', today()->subDays(1))->count();
        $twodays = payment_processing::whereDate('created_at', today()->subDays(2))->count();
        $threedays = payment_processing::whereDate('created_at', today()->subDays(3))->count();
        $fourdays = payment_processing::whereDate('created_at', today()->subDays(4))->count();
        $fivedays = payment_processing::whereDate('created_at', today()->subDays(5))->count();
        $sixdays = payment_processing::whereDate('created_at', today()->subDays(6))->count();
        $svendays = payment_processing::whereDate('created_at', today()->subDays(7))->count();




 $data=[];
             $data['users']=DB::SELECT('select * FROM users');


        $chart = new analysis;
        $chart->labels(['Monday', 'Tuesday', 'Wednasday','Thursday','Friday','Saturday','Sunday']);
        $chart->dataset('Deposits', 'line', collect([$svendays, $sixdays, $fivedays,$fourdays,$twodays,$yesterday,$today]));
        return view('analysis',['chart' => $chart],$data);
    }

}
