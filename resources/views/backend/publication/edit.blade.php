@extends('backend.master')
@section('content')
<style>
    .student_name {
        font-weight: bold;
        color: #04224e;
        font-size: 20px;
    }

    .form-control {
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
            <div>Edit Student Information</div>
            <a href="{{ route('backend.publication.index') }}" class="btn btn-danger">Back to Publication List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.publication.update',$publication->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <label class="student_name">Thesis/Project Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $publication->title }}">
                    </div>
                    <div class="col-md-4">
                        <label class="student_name">Cover Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @if($publication->photo)
                        <div>
                            <label class="student_name">Previous Photo:</label><br>
                            <img src="Publication/{{$publication->photo}}" alt="Previous Photo" style="max-width: 50px;">
                        </div>
                    @endif
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label class="student_name">Student Details</label>
                        <textarea name="student_details" class="form-control" id="sd">{{ $publication->student_details }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="student_name">University Name</label>
                        <input type="text" name="university" class="form-control" value="{{ $publication->university }}">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class="student_name">Department Name</label>
                        <input type="text" name="department" class="form-control" value="{{ $publication->department }}">
                    </div>
                    <div class="col-md-4">
                        <label class="student_name">Google Scholar Link</label>
                        <input type="text" name="scholar_link" class="form-control" value="{{ $publication->scholar_link }}">
                    </div>
                    <div class="col-md-4">
                        <label class="student_name">Supervisor Name</label>
                        <input type="text" name="supervisor" class="form-control" value="{{ $publication->supervisor }}">
                    </div>
                </div><br>
                <div class="card-footer">
                    <center><button type="submit" class="btn btn-lg btn-primary">Update Publication</button></center>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
