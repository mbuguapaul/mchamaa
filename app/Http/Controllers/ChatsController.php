<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chat;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use DB;
class ChatsController extends Controller
{
    
/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */

    public function __construct()
{
  $this->middleware('auth');
}




 /* Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return chat::with('user')->get();
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */

public function chat($id)
{
	$userid = Auth::user()->id;

	 $data=[];
         $data['users']=DB::SELECT('select * FROM users');
        $data['confirmed']=DB::SELECT('select * FROM invites WHERE confirmed =1 AND groupid=?',[$id]);
        $data['invites']=DB::SELECT('select * FROM invites WHERE confirmed =0 AND groupid=?',[$id]);
        $data['groups']=DB::SELECT('select * FROM groups WHERE id =?',[$id]);
        $data['group_members']=DB::SELECT('select * FROM group_members WHERE group_id =?',[$id]);

         $data['mygroup']=DB::SELECT('select * FROM group_members WHERE User_id =? AND group_id = ?',[$userid,$id]);

          $data['logs']=DB::SELECT('select * FROM payment_processings WHERE group_id =?',[$id]);
          $data['chats']=DB::SELECT('select * FROM chats WHERE group_id =?',[$id]);
          $data['withdraws']=DB::SELECT('select * FROM withdraws WHERE group_id =?',[$id]);

          $timet=Carbon::now()->subMinutes(10);
          $data['logg']=DB::SELECT('select * FROM payment_processings WHERE group_id =? AND created_at > ?',[$id,$timet]);

$data['withh']=DB::SELECT('select * FROM withdraws WHERE group_id =? AND created_at > ?',[$id,$timet]);
  return view('chat',$data);
}


public function sendMessage(Request $request)
{
 $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}


public function newchat(Request $request)
{
	$user = Auth::user()->id;
	$message= $request->input('message');
	$gid= $request->input('groupid');


 $chat = new chat;

            $chat->group_id = $gid;
            $chat->user_id = $user;
            $chat->message = $message;
           
            $chat->save();





  return redirect()->back();
}

}
