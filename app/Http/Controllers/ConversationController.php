<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Categories;
use App\Config;
use Illuminate\Support\Facades\Redirect;
use Auth;
class ConversationController extends Controller
{
  public function send(Request $request)
  {
    $data = json_decode(stripslashes($request->input('to')));  

    $data = explode(',',$data);

    foreach($data as $d){
       
        $application = \App\Applied::find($d);
        $obj = new \App\Conversation();
        $obj->to = $application->user_id;
        $obj->from = $request->input('from');
        $obj->msg = $request->input('msg');
        $obj->seen = 0;
        $obj->application_id = $d;
        $obj->save();
    }
    echo 1;
  }

  public function inbox($country)
  {
    $to = \App\Conversation::with(['to'])->where('from',Auth::user()->id)->orderBy('updated_at','desc')->get();
   return view('messages')->with('country',$country)->with('to',$to);
  }
}
