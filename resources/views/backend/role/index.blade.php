@extends('backend.master')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">Role Management Information</div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($roles as $role )
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->email}}</td>
                        <td>{{$role->role}}</td>
                        <td>
                            <a href="{{route('backend.role.edit',$role->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('backend.role.delete',$role->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
