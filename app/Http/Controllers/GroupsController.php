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
    public function store(Request $request)
    {
        $this->validate($request, [
            'group_name'=>'min:2|max:70',
            'objectives'=>'min:5',
            'pay_number' => 'min:12|required|regex:/(254)[0-9]{9}/',

            ]);

            $groups = new groups;

            $groups->group_name = Input::get('group_name');
            $groups->objectives = Input::get('objectives');
            $groups->amount = Input::get('amount');
            $groups->penalty = Input::get('penalty');
            $groups->pay_number = Input::get('pay_number');
            $groups->period_of_contibution = Input::get('period');
            $groups->created_by =Auth::User()->id;

            $groups->save();
            
           

            $group_members = new group_members;

            // $group_members->group_name = Input::get('group_name');
            $group_members->User_id =Auth::User()->id;
            $group_members->group_id= $groups->id;
            $group_members->user_level= $groups->id;
            $group_members->save();
            
            

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(groups $groups)
    {
        //
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
    public function destroy(groups $groups)
    {
        //
    }
}
