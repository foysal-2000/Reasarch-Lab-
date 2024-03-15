@extends('frontend.master')
@section('content')
    <!-- Supervisor Section - Home Page -->
    <div class="container">
      <h1 class="mt-2 mx-2">Supervisor</h1>
        <div class="row mt-4">
            @foreach ($supervisors as $almuni)
            <div class="card mx-3 mb-2" style="width: 18rem;">
                <img src="Supervisor/{{$almuni->photo}}" class="card-img-top rounded-circle" alt="...">
                <div class="card-body">
                    <a href="{{$almuni->schoolar_link}}"><h5 class="card-title">{{$almuni->supervisor_name}}</h5></a>
                    <p class="card-text">{{$almuni->desgination}}<br>{{$almuni->department}}<br>{{$almuni->university}}</p>
                    @if(auth()->check())
                        <a href="mailto:{{$almuni->email}}"" class="btn btn-primary">Email</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Email</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End Supervisor Section -->

    <!-- Alumni Student Section - Home Page -->
    <div class="container">
      <h1 class="mt-5 mx-2">Alumni Student</h1>
        <div class="row mt-4">
        @foreach ($almunis as $almuni)
            <div class="card mx-3 mb-2" style="width: 18rem;">
                <img src="Almuni_Student/{{$almuni->photo}}" class="card-img-top rounded-circle" alt="...">
                <div class="card-body">
                    <a href="{{$almuni->schoolar_link}}"><h5 class="card-title">{{$almuni->student_name}}</h5></a>
                    <p class="card-text">Alumni Student<br>{{$almuni->department}}<br>{{$almuni->university}}</p>
                    @if(auth()->check())
                        <a href="mailto:{{$almuni->email}}" class="btn btn-primary">Email</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Email</a>
                    @endif

                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
