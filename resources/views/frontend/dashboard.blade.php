@extends('frontend.master')
@section('content')
<style>
    #card {
        width: 400px;
        margin-left: 50px;
    }
    .sidebar{
        font-size: 20px;
    }
    #card_1{
        margin-left: -220px;
        margin-right: -10px;
    }
    .header{
        margin-left:50px;

    }
    #card_2{
        margin-left:80px;
        margin-right: 10px;
    }
</style>
<h3 class='header mt-2'>Welcome To Dashboard <b >{{auth()->user()->name}}</b></h3>
<div class="row mt-5">
    <div class="col-md-4">
        <div class="card" id="card">
            <div class="card-header">
                <h3>Pages</h3>
            </div>
            <div class="card-body">
                <div id="sidebar-wrapper" class="sidebar">
                    <div class="sidebar">
                        <a href="#">Home</a>
                    </div>
                    <div class="sidebar">
                        <a href="#">Contact Us</a>
                    </div>
                    <div class="sidebar">
                        <a href="#">Service</a>
                    </div >
                    <div class="sidebar">
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card" id="card_1">
            <div class="card-header">Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    @foreach ($users as $user)


                        <label> Current Name</label>
                        <input type="text" class="form-control"  value="{{$user->name}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label> Current Email</label>
                        <input type="email" class="form-control"  value="{{old('email')}}" readonly>
                    </div>
                </div><br>
              
                <div class="row">
                    <div class="col-md-6">
                        <label> Current Username</label>
                        <input type="text" class="form-control"  value="{{old('name')}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Current Password</label>
                        <input type="email" class="form-control" value="{{old('email')}}" readonly>
                    </div>
                </div><br>
                <table class="table table-white table-striped">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th><center>Input Your New Information</center></th>
                        </tr>
                    </tbody>
                </table>
            <form action="{{route('backend.auth.update',$user->id)}}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label>New Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Full Name">
                    </div>
                    <div class="col-md-6">
                        <label>New Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email Address">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label>New Username</label>
                        <input type="text" class="form-control" name="username" value="{{old('name')}}" placeholder="User Name">
                    </div>
                    <div class="col-md-4">
                        <label>New Password</label>
                        <input type="email" class="form-control" name="password" value="{{old('email')}}" placeholder="Password">
                    </div>
                    <div class="col-md-4">
                        <label>New Confirm Password</label>
                        <input type="email" class="form-control" name="confirm password" value="{{old('email')}}" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="form-control">Change Information</button>
            </div>
        </form>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card" id="card_2">
            <div class="card-header">Password Change</div>
            <div class="card-body">
        <form action="{{route('backend.auth.update',$user->id)}}" method="POST">
                <label>Current Password</label>
                <input type="password" name="password" class="form-control"value="{{old('password')}}"><br>
                <label>New Password</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}"><br>
                <label>Confirm Password</label>
                <input type="password" name="confirm password" class="form-control" value="{{old('confirm password')}}">

            </div>
            <div class="card-footer">
                <button type="submit" class="form-control">Change Information</button>
            </div>
        </div>
        </form>
    </div>

</div><br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection
