<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index(){

        if(isset(request()->cat)){

            $all_ads = Ad::whereHas('category', function ($query){
                $query->where('name', request()->cat);
            
        })->get();

     }
      else{
            $all_ads = Ad::all();
        }

        
        $all_categories = Category::all();

        return view('welcome', compact('all_ads', 'all_categories'));
    }

    public function show($id){

        $single_ad = Ad::find($id);

        if(Auth::user() && Auth::user()->id !== $single_ad->user_id ){
            $single_ad->increment('views');
        }
       

        return view('singleAd',compact('single_ad'));
    }

    public function sendMessage(Request $request, $id){

        $request->validate([
            
            'msg' => 'required'

        ]);

        $ad = Ad::find($id);
        $ad_owner = $ad->user;

        $new_msg = new Message();
        $new_msg->text = $request->msg;
        $new_msg->sender_id = Auth::user()->id;
        $new_msg->receiver_id = $ad_owner->id;
        $new_msg->ad_id = $ad->id;
        $new_msg->save();

        return redirect()->back()->with('message', 'Poruka je poslata');
      
    }
}
