@extends('backend.master')
@section('content')
<style>
    #btn{
        margin-top:25px;
        margin-left:10px;
    }
    #di{
        font-size: 20px;
    }
</style>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
        <form action="{{route('backend.role.update',$role->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" value="{{$role->name}}" readonly>

                </div>
                <div class="col-md-6">
                    <label for="name">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$role->email}}" readonly>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Current Role</label>
                    <input class="form-control" value="{{$role->role}}" readonly><br>
                </div>
                <div class="col-md-4">
                    <label for="name">Role</label>
                    <select class="form-control" name="role" id="di">
                        <option>Select One</option>
                        <option value="guest">Guest</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" id="btn" class="btn btn-lg btn-primary form-control">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
