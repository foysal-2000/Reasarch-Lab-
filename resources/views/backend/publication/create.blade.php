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
            <div>Student Informaion</div>
            <a href="{{route('backend.publication.index')}}" class="btn btn-danger">Publication List</a>
        </div>
        <div class="card-body">
    <form action="{{route('backend.publication.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-8">
                    <label class="student_name">Thesis/Project Title</label>
                    <input type="text" name="title" class="form-control"  value="{{ old('title') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="student_name">Thesis Photo</label>
                    <input type="file" name="photo" class="form-control"  value="{{ old('photo') }}">
                    @error('photo')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                </div>

            </div><br>
            <div class="row">
                <div class="col-md-5">
                    <label class="student_name">Student Details</label>
                    <textarea name="student_details"  class="form-control" id="sd" value="{{ old('student_details') }}"></textarea>
                </div>
                <div class="col-md-4">
                    <label class="student_name">University Name</label>
                    <input type="text" name="university" class="form-control"  value="{{ old('university') }}">
                </div>
                <div class="col-md-3">
                    <label class="student_name">Publication Year</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year') ?? date('Y') }}" required>
                </div>

            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label class="student_name">Department Name</label>
                    <input type="text" name="department" class="form-control"  value="{{ old('department') }}">
                </div>
                <div class="col-md-4">
                    <label class="student_name">Google Schoolar Link</label>
                    <input type="link" name="scholar_link" class="form-control"  value="{{ old('scholar_link') }}">
                </div>
                <div class="col-md-4">
                    <label class="student_name">Supervisor Name</label>
                    <input type="text" name="supervisor" class="form-control"  value="{{ old('supervisor') }}">
                </div>
            </div><br>
        </div>
        <div class="card-footer">
            <center><button type="submit" class="btn btn-lg btn-primary">Create Publication</button></center>
        </div>
    </form>
    </div>
</div>
@endsection

