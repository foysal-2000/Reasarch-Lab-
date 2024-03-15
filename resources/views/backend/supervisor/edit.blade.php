@extends('backend.master')
@section('content')
<style>
    .student_name{
        font-weight:bold;
        color: #04224e;
        font-size: 20px;
    }
    .form-control{
        height: 40px;
    }
</style>
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Congrats!</strong> {{ session('success') }}
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
            <div>Edit Supervisor Information</div>
            <a href="{{route('backend.supervisor.index')}}" class="btn btn-danger">Supervisor List</a>
        </div>
        <div class="card-body">
    <form action="{{ route('backend.supervisor.update', $supervisor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="student_name">Supervisor Name</label>
                    <input type="text" name="supervisor_name" class="form-control" value="{{ $supervisor->supervisor_name }}">
                </div>
                <div class="col-md-4">
                    <label class="student_name">Supervisor Photo</label>
                    <input type="file" name="photo" class="form-control">
                    @if($supervisor->photo)
                        <div>
                            <label class="student_name">Previous Photo:</label><br>
                            <img src="Supervisor/{{$supervisor->photo}}" alt="Previous Photo" style="max-width: 100px;">
                        </div>
                    @endif
                </div>

                <div class="col-md-4">
                    <label class="student_name">Linkdin ID</label>
                    <input type="text" name="linkdin" class="form-control" value="{{ $supervisor->linkdin }}">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class="student_name">Supervisor Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $supervisor->email }}">
                </div>
                <div class="col-md-4">
                    <label class="student_name">University Name</label>
                    <input type="text" name="university" class="form-control" value="{{ $supervisor->university }}">
                </div>
                <div class="col-md-4">
                    <label class="student_name">Designation</label>
                    <input type="text" name="desgination" class="form-control" value="{{ $supervisor->desgination }}">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label class="student_name">Department Name</label>
                    <input type="text" name="department" class="form-control" value="{{ $supervisor->department }}">
                </div>
                <div class="col-md-6">
                    <label class="student_name">Google Scholar Link</label>
                    <input type="text" name="scholar_link" class="form-control" value="{{ $supervisor->scholar_link }}">
                </div>
            </div><br>
        </div>
        <div class="card-footer">
            <center><button type="submit" class="btn btn-lg btn-primary">Update Supervisor Information</button></center>
        </div>
    </form>
    </div>
</div>
@endsection
