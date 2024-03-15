@extends('frontend.master')
@section('content')
    <div class="container">
        <h1 class="mt-2 mx-2">Supervisor</h1>
        <div class="row mt-4">
            @foreach ($supervisors as $supervisor)
                <div class="card mx-3 mb-2" style="width: 18rem;">
                    <img src="Supervisor/{{ $supervisor->photo }}" class="card-img-top rounded-circle" alt="...">
                    <div class="card-body">
                        <a href="{{ $supervisor->schoolar_link }}">
                            <h5 class="card-title">{{ $supervisor->supervisor_name }}</h5>
                        </a>
                        <p class="card-text">
                            {{ $supervisor->designation }}<br>{{ $supervisor->department }}<br>{{ $supervisor->university }}</p>
                        @if(auth()->check())
                            <a href="mailto:{{ $supervisor->email }}" class="btn btn-primary">Email</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Email</a>
                        @endif
                        @if(auth()->check())
                            <a href="{{ $supervisor->linkedin }}" class="btn btn-primary">LinkedIn</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">LinkedIn</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h1 class="mt-5 mx-2">Current Student</h1>
        <div class="row mt-4">
            @foreach ($current_students as $student)
                <div class="card mx-3 mb-2" style="width: 18rem;">
                    <img src="Student/{{ $student->photo }}" class="card-img-top rounded-circle" alt="...">
                    <div class="card-body">
                        <a href="{{ $student->schoolr_link }}">
                            <h5 class="card-title">{{ $student->student_name }}</h5>
                        </a>
                        <p class="card-text">Current Student<br>{{ $student->department }} <br>{{ $student->university }}
                        </p>
                        @if(auth()->check())
                            <a href="mailto:{{ $student->email }}" class="btn btn-primary">Email</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Email</a>
                        @endif
                        @if(auth()->check())
                            <a href="{{ $student->linkedin }}" class="btn btn-primary">LinkedIn</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">LinkedIn</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
