@extends('layouts.app')

@section('content')

<div class="container">
    <h1 style="text-align:center;">Edit Event</h1>
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center><strong>{{Session::get('success')}}</strong></center>
        </div>
    @endif
    <form action="/change/{{$event->id}}" method="post" >
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Event Name</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('name')}}</span>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Event Name" name="name" value="{{$event->event_name}}">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('description')}}</span>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$event->description}}</textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Event Date</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('eventdate')}}</span>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Event Date" name="eventdate" value="{{$event->event_date}}">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Maximum number of attendees</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('attendees')}}</span>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Maximum number of attendees" name="attendees" value="{{$event->attendees}}">
        </div>

        <button class="btn btn-primary">Submit</button>
        @csrf
    </form>
</div><br><br><br>
<center><a href="/home"><button class="btn btn-secondary">Back</button></a></center>
    
@endsection