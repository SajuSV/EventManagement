@extends('theme')
@section('content')
<header class="fixed-top" style="background-color: rgba(79, 79, 79, 0.5);">
        <div class="container text-light pt-2 ">
            <nav class="row p-2">
                <div class="col-12 d-flex justify-content-center ">
                    <h1>Upcoming Events</h1>
                </div>
            </nav>
        </div>
</header>
<div class="container">
    <div class="row" style="padding-top: 100px;">
    @foreach ($allevent as $event)
        <div class="col-12 col-lg-6 p-2">
            <div class="card">
                <h5 class="card-header">{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$event->event_name}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                    <a href="/register/{{$event->id}}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Pagination link -->
        <div>
            {{ $allevent ->links("pagination::bootstrap-5") }} 
        </div>

    </div>
</div>

@endsection