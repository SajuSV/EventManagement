@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Event Date : <b>&nbsp;{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</b></h5>
                <div class="card-body">
                    <h5 class="card-title">Event Name : <b>&nbsp;{{$event->event_name}}</b></h5>
                    <p class="card-text">Description : <b>&nbsp;{{$event->description}}</b></p>
                    
                </div>
                <p class="card-footer"><b>Number of attendees :</b> &nbsp;{{count($regis)}} / {{$event->attendees}}</p>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                        <th scope="col">SL. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Date of Registration</th>
            </tr>
        </thead>
        <tbody><br><br>
        <center><h4>Registered Users</h4></center><hr>
            <!-- {{$sn=1}} -->
        @foreach ($regis as $registrstion)
            <tr>
                        <th scope="row">{{$sn}}</th>
                        <td>{{$registrstion->name}}</td>
                        <td>{{$registrstion->email}}</td>
                        <td>{{$registrstion->phonenumber}}</td>
                        <td>{{$registrstion->created_at}}</td>

            </tr>
            <!-- {{$sn++}} -->
            @endforeach
        </tbody>
    </table>
</div>

<center><a href="/home" ><button class="btn btn-secondary">Back</button></a></center>
    
@endsection