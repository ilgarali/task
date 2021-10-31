@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            </div>
            <div class="col-md-12">
                <form action="{{route('employee.update',$employee->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Firstname </label>
                        <input value="{{$employee->firstname}}" type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Lastname </label>
                        <input type="text" name="lastname" value="{{$employee->lastname}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" value="{{$employee->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Company</label>
                        <select name="company_id" class="form-select form-control" aria-label="Default select example">
                            <option value="0" selected>SelectCompany</option>

                            @foreach ($companies as $company)
                                
                            <option @if ($employee->company?->id == $employee->company_id)
                                selected
                            @endif value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                            
                          </select>
                      </div>
                    
        
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input value="{{$employee->phone}}" type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <button type="submit" class="btn btn-success">Add

                      </button>
                </form>
            </div>
        </div>
    </div>


@endsection