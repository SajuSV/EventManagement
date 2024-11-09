@extends('layouts.app')

@section('content')


<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center><strong>{{Session::get('success')}}</strong></center>
        </div>
    @endif
    <form action="/submitevent" method="post" novalidate>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Event Name</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('name')}}</span>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Event Name" name="name" value="{{old('name')}}">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('description')}}</span>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description')}}</textarea>
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Event Date</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('eventdate')}}</span>
        <input type="date" class="form-control" id="futureDate" placeholder="Event Date" name="eventdate" value="{{old('eventdate')}}">
        </div>

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Maximum number of attendees</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('attendees')}}</span>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Maximum number of attendees" name="attendees" value="{{old('attendees')}}">
        </div>

        <button class="btn btn-primary">Submit</button>
        @csrf
    </form>
</div>


<!-- Date blocker code  -->
<script>
    const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];
        document.getElementById('futureDate').setAttribute('min', formattedDate);
</script>

<center><a href="/home"><button class="btn btn-secondary">Back</button></a></center>
@endsection