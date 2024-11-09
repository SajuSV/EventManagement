<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Registrations;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    // Admin Dashboard
    public function index()
    {
        $allevent=Events::latest()->get();

        // $users=Registrations::latest()->get();
        
        $users = Registrations::select('event_id')
    ->selectRaw('count(event_id) as registration_count') // Count the registrations
    ->groupBy('event_id')
    ->get();
    
    // ->toArray();
    //     echo "<pre>";
    //     print_r ($users);

        return view('home',['allevent'=>$allevent,'users'=>$users]);
    }

    // Admin New Event Add
    public function addevent(){
        return view('addevent');
    }

    // Admin Event Add Database
    public function submitevent (request $request){

        // Validation
        $message=[
            'name.required'=>'Please enter Event Name',
            'name.regex'=>'Alphabets and space only allowed',
            'description.required'=>'Please enter your Description',
            'eventdate.required' => 'Please enter Event Date',
            'eventdate.date' => 'The event date must be a valid date.',
            'eventdate.date_format' => 'The event date must be in the format DD-MM-YYYY.',
            'eventdate.after' => 'The event date must be a date from today.',
            'attendees.required'=>'Please enter Number of Attendees',
            'attendees.numeric'=>'Enter Valid Number',
        ];
        $rule=[
            'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'description'=>'required',
            'eventdate'=>'required|date|date_format:Y-m-d|after:yesterday',
            'attendees'=>'required|numeric',
        ];
        $request->validate($rule,$message);

        // Database
        $event= new Events();
        $event->event_name=$request->name;
        $event->description=$request->description;
        $event->event_date=$request->eventdate;
        $event->attendees=$request->attendees;
        $event->save();
        return back()->with('success','Registration Success');
    }

    // Admin Event View
    public function view($id){
        $event=Events::find($id);

        $regis=Registrations::where('event_id','=',$id)->get();
        return view('view',['event'=>$event,'regis'=>$regis]);
    }

    // Admin Event Update
    public function update($id){
        $event=Events::find($id);
        return view('update',['event'=>$event]);
    }

    // Admin Event Update Database
    public function change(request $request, $id){
        // Validation
        $message=[
            'name.required'=>'Please enter Event Name',
            'name.regex'=>'Alphabets and space only allowed',
            'description.required'=>'Please enter your Description',
            'eventdate.required' => 'Please enter Event Date',
            'eventdate.date' => 'The event date must be a valid date.',
            'eventdate.date_format' => 'The event date must be in the format DD-MM-YYYY.',
            'eventdate.after' => 'The event date must be a date from today.',
            'attendees.required'=>'Please enter Number of Attendees',
            'attendees.numeric'=>'Enter Valid Number',
        ];
        $rule=[
            'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'description'=>'required',
            'eventdate'=>'required|date|date_format:Y-m-d|after:yesterday',
            'attendees'=>'required|numeric',
        ];
        $request->validate($rule,$message);

        // Database 
        $event=Events::find($id);
        $event->event_name=$request->name;
        $event->description=$request->description;
        $event->event_date=$request->eventdate;
        $event->attendees=$request->attendees;
        $event->save();
        return redirect('/home');
    }

    // Admin Event Delete
    public function delete($id){
        $event=Events::destroy($id);
        return back();
    }



   
}
