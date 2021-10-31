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
                <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Firstname </label>
                        <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Firstname">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Lastname </label>
                        <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Lastname">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Company</label>
                        <select name="company_id" class="form-select form-control"  aria-label="Default select example">
                            <option value="0" selected>SelectCompany</option>

                            @foreach ($companies as $company)
                                
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                            
                          </select>
                      </div>
                    
        
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Phone">
                      </div>
                      <button type="submit" class="btn btn-success">Add

                      </button>
                </form>
            </div>
        </div>
    </div>


@endsection