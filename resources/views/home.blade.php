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
                <div class="d-flex flex-column align-items-center my-4">
                    <h2 class="mt-3">Employee </h2>
                    <a href="{{ url('/googleform') }}" class="btn btn-primary mb-2" style="width:200px;">Questionnaire for Employees</a>
                    <a href="{{ url('/datatable') }}" class="btn btn-primary mb-2" style="width:200px;">Results for Employees</a>

                    <h2 class="mt-4">New Applicants</h2>
                    <a href="{{ url('/applicants') }}" class="btn btn-primary mb-2" style="width:200px;">Questionnaire for New Applicants</a>
                    <a href="{{ url('/datatable_app') }}" class="btn btn-primary mb-2" style="width:200px;">Results for New Applicants</a>
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
