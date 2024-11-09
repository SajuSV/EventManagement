@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Events</h3>
                    <a href="/addevent" class="text-decoration-none btn btn-secondary">Add Events</a>
                </div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->


                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">SL. No.</th>
                        <th scope="col">Event Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Event Date</th>
                        <th scope="col">Attendees</th>
                        <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {{$sn=1}} -->
                    
                    @foreach ($allevent as $event)
                        <tr>
                        <th scope="row">{{$sn}}</th>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                        <td>
                           
                             <?php for($i=0;$i<count($users);$i++){ 
                                if (($event->id)==$users[$i]['event_id']){ ?>
                                    {{$users[$i]['registration_count']}}
                                <?php } } ?>
                                / {{$event->attendees}}
                        </td>
                        <td>
                            <a href="/view/{{$event->id}}"><button class="btn btn-primary">View</button></a> &nbsp;
                            <a href="/update/{{$event->id}}"><button class="btn btn-success">Update</button></a> &nbsp;
                            <a href="/delete/{{$event->id}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                        </tr>
                    <!-- {{$sn++}} -->
                    @endforeach
                    
                    
                    </tbody>
                </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
