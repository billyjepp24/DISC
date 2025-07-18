@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="text-center">
                <a href="{{ url('/googleform') }}" class="btn btn-primary" style="width:200px;">Go to Questionnaire</a> 
                <a href="{{ url('/datatable') }}" class="btn btn-primary" style="width:200px;">Go to Data Table</a>
                <a href="{{ url('/googleform-app') }}" class="btn btn-primary" style="width:200px;">Go to Questionnaire(New Applicants)</a>
                <a href="{{ url('/datatable_app') }}" class="btn btn-primary" style="width:200px;">Go to Data Table(New Applicants)</a>
                </div>   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                      
            </div>
        </div>
    </div>
</div>
@endsection
