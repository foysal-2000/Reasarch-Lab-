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
    #status{
        height: 40px;
        font-size: 20px;
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
            <div>Edit Carousel</div>
            <a href="{{ route('backend.carousel.index') }}" class="btn btn-primary">Carousel List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.carousel.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label class="student_name">Carousel Name</label>
                        <input type="text" name="carousel_name" class="form-control" value="{{ $carousel->carousel_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="student_name">Carousel Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @if($carousel->photo)
                        <div>
                            <label class="student_name">Previous Photo:</label><br>
                            <img src="Carousel/{{$carousel->photo}}" alt="Previous Photo" style="max-width: 100px;">
                        </div>
                        @endif
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label class="student_name">Carousel Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="Active" {{ $carousel->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Disable" {{ $carousel->status == 'Disable' ? 'selected' : '' }}>Disable</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="student_name">From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ $carousel->from_date }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="student_name">To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ $carousel->to_date }}" required>
                    </div>
                </div><br>
        </div>
        <div class="card-footer">
            <center><button type="submit" class="btn btn-lg btn-primary">Update Carousel</button></center>
        </div>
        </form>
    </div>
</div>
@endsection
