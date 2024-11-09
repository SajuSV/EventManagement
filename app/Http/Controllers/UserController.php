<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Registrations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // User Homepage
    public function index(){
        $allevent=Events::latest()->get();
        
        
        $today = Carbon::now();
        $days = Carbon::now()->addDays(15);
        $events = Events::where('event_date', '>=', $today)->where('event_date', '<=', $days)->orderBy('event_date')->paginate(6);

        
        return view('index',['allevent'=>$events]);
    }

    // User Registration Form
    public function register($id){
        $event=Events::find($id);
        $users=Registrations::where('event_id','=',$id)->get();
        return view('register',['event'=>$event,'users'=>$users]);
    }

    // User Registration Form Database
    public function submitregister (request $request, $id){
        $message=[
            'name.required'=>'Please enter your name',
            'name.regex'=>'Alphabets and space only allowed',
            'email.required'=>'Please enter your email',
            'email.email'=>'Enter valid email',
            'phonenumber.required'=>'Please enter your contact',
            'phonenumber.max'=>'Enter Valid Phone Number',
        ];
        $rule=[
            'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'email'=>'required|email',
            'phonenumber'=>'required|max:12',
        ];
        $request->validate($rule,$message);

        

        $check= Registrations::where('email','=',$request->email)->get()->toarray();
        foreach ($check as $checks){
            if ($checks['event_id']==$id){
                return back()->with('success','User Already Exists');
            } 
        }
        $value=1;

        if($value==1){
            $event= new Registrations();
            $event->event_id=$id;
            $event->name=$request->name;
            $event->email=$request->email;
            $event->phonenumber=$request->phonenumber;
            $event->save();
            return back()->with('success','Registration Success');
        }
    }
}
