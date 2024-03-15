@extends('frontend.master')
@section('content')
    <section>
        <div class="container">
            <h3 class="bold">Publication</h3><br>
            <h3>Jurnal Papers</h3>
        </div>
    </section>
    @foreach ($publications->groupBy('year') as $year => $publicationsGroup)
    <section>
        <div class="container">
            <div class="row">
                <table class="table table-white table-striped">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th><li>{{$year}}</li></th>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="row">
                    @foreach ($publicationsGroup as $publication)
                        <div class="card mb-3" style="width: 18rem; margin-right: 20px;">
                            <img src="Publication/{{$publication->photo}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{route('backend.almuni.index')}}" class="btn btn-block">
                                    <h5 class="card-title">{{$publication->title}}</h5>
                                </a>
                                <p class="card-text">{{$publication->department}}</p>
                                @if(auth()->check())
                                    <a href="#" class="btn btn-primary">Email</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">Email</a>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </section>
    @endforeach
    @endsection
