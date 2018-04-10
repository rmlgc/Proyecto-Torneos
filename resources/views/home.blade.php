@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav">
        <li class=" mr-20">
            <a href="" class="navbar-right btn border-warning text-primary ">Create Tournament
            </a>
        </li>
    </ul>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
