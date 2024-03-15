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
        <div class="card-header d-flex justify-content-between">
            <div>Publication Information</div>
            <a href="{{route('backend.publication.create')}}" class="btn btn-primary">Create Publication </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Year</th>
                        <th>Image</th>
                        <th>publication Name</th>
                        <th>Student Details</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($publications as $publication)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$publication->year}}</td>
                        <td><img src="Publication/{{$publication->photo}}"style="width: 50px;"></td>
                        <td>{{$publication->title}}</td>
                        <td>{{ $publication->student_details}}</td>

                        <td>
                            <a href="{{route('backend.publication.edit',$publication->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('backend.publication.delete',$publication->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
