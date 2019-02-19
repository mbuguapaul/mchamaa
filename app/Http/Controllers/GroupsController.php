<?php

namespace App\Http\Controllers;
use DB;
use App\groups;
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
            'group_name'=>'min:4|max:70',
            'objectives'=>'min:5',
            'pay_number' => 'min:12|required|regex:/(254)[0-9]{9}/',

            ]);
            $creator =Auth::user()->id;
            $group_name = $request->input('group_name');
            $objectives = $request->input('objectives');
            $amount = $request->input('amount');
            $penalty = $request->input('penalty');
            $pay_number = $request->input('pay_number');
            $period = $request->input('period');

            DB::insert('insert into groups (group_name,objectives,amount,penalty,pay_number,period_of_contibution,created_by) values(?,?,?,?,?,?,?)',
            [$group_name,$objectives,$amount,$penalty,$pay_number,$period,$creator]);


           

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
