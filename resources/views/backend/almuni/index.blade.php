@extends('backend.master')
@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats!</strong> <b>{{ session('success') }}</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($almunis as $almuni )
                    <tr>
                        <td>{{$i++}}</td>
                        <td><img src="Almuni_Student/{{$almuni->photo}}" style="width: 50px;"></td>
                        <td>{{$almuni->student_name}}</td>
                        <td>{{$almuni->email}}</td>
                        <td>{{$almuni->department}}</td>
                        <td>
                            <a href="{{route('backend.almuni.edits',$almuni->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('backend.almuni.delete',$almuni->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
