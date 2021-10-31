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

                    {{ __('message.loggedin') }}


                    @if (Auth::user()->is_admin)
                    <div class="alert alert-success my-2">
                        {{__('message.welcome')}}
                    </div>
                    <div>
                       <a href="{{route('company.index')}}"> Companies</a>
                   
                   </div>
                   <div>
                   <a href="{{route('employee.index')}}"> Employees </a>
               </div>                                       
               @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
