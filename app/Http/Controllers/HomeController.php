<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

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
       // $all_ads = Ad::where('user_id', Auth::user()->id)->get();
       $all_ads = Auth::user()->ads;

        return view('home', compact('all_ads'));
    }

    public function addDeposit(){

        return view('home.addDeposit');
    }

    public function updateDeposit(Request $request) {

        $user = Auth::user();

        $request->validate([
            "deposit"=>"required|max:4"
        ],
        [
            "deposit.max" => "Can not add more than 9999 rsd at once"
        ]);

        $user->deposit = $user->deposit + $request->deposit;
        $user->save();

        return redirect(route('home'));
    }

    public function showAdform(){

        $all_categories = Category::all();

        return view('home.showAdForm', compact('all_categories'));
    }

    public function saveAd(Request $request){
        $request->validate([
            'title' => 'required | max:255',
            'body' => 'required',
            'price' => 'required',
            'image1' => 'mimes: jpg,jpeg,png',
            'image2' => 'mimes: jpg,jpeg,png',
            'category' => 'required'

        ]);

        if($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1_name = time() . '1.'. $image1->extension();
            $image1->move(public_path('ad_images'), $image1_name);
        }

        if($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2_name = time() . '2.'. $image2->extension();
            $image2->move(public_path('ad_images'), $image2_name);
        }

        Ad::create([

            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'image1' => (isset($image1_name)) ? $image1_name : null,
            'image2' => (isset($image2_name)) ? $image2_name : null,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category

        ]);

        return redirect (route('home'));
    }

    public function showSingleAd($id){

        $single_ad = Ad::find($id);

        return view('home.singleAd', compact('single_ad'));
    }

    public function showMessage(){

        $messages = Message::where('receiver_id',Auth::user()->id)->get();

        return view('home.messages', compact('messages'));

    }

    public function replay(){
        
        $sender_id = request()->sender_id;
        $ad_id = request()->ad_id;

        $messages = Message::where('sender_id',$sender_id)->where('ad_id',$ad_id)->get();

        return view('home.replay',compact('sender_id','ad_id','messages'));
    }

    public function replayStore(Request $request){

        $request->validate([
           
            'msg' => 'required'

        ]);
        
        $sender = User::find($request->sender_id);
        $ad = Ad::find($request->ad_id);

        $new_msg = new Message();
        $new_msg->text = $request->msg;
        $new_msg->sender_id = Auth::user()->id;
        $new_msg->receiver_id = $sender->id;
        $new_msg->ad_id = $ad->id;
        $new_msg->save();

        return redirect()->back()->with('message', 'Poruka je poslata');

    }

    public function deleteMessage($id){

        $message = Message::find($id);
        $message->delete();

        return redirect()->route('home.showMessages');
    }
}
