@extends('theme')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <center>
                    <h5 class="card-header">{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</h5>
                    <div class="card-body">
                        <h1 class="card-title">{{$event->event_name}}</h1>
                        <h4 class="card-text">{{$event->description}}</h4>
                        
                    </div>
                </center>
            </div>
        </div>
@if(count($users) < $event->attendees)
<h1 style="text-align:center; padding-top:30px;">Register now</h1>
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center><strong>{{Session::get('success')}}</strong></center>
        </div>
    @endif
        <form action="/submitregister/{{$event->id}}" method="post" novalidate>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('name')}}</span>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name"  value="{{old('name')}}">
            </div>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('email')}}</span>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email"  value="{{old('email')}}">
            </div>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone Number</label> &nbsp;<span class="text-danger" style="font-size:10px;">{{$errors->first('phonenumber')}}</span>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Phone" name="phonenumber"  value="{{old('phonenumber')}}">
            </div>



            <button class="btn btn-primary">Submit</button>
            @csrf
        </form>
        @else
            <h1 style="text-align:center; padding-top:30px;">Registration Closed</h1>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <center><strong>{{Session::get('success')}}</strong></center>
                </div>
            @endif
        @endif
    </div>
</div>
<center><a href="/"><button class="btn btn-secondary">Back</button></a></center>

@endsection
