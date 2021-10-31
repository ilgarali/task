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
                <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name </label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" 
                        placeholder="name">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Logo</label>
                        <input class="form-control" name="logo" type="file" id="formFile">
                      </div>
        
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Website</label>
                        <input type="text" name="website" class="form-control" id="exampleFormControlInput1" 
                        placeholder="https://ilgaraliyev.com/">
                      </div>
                      <button type="submit" class="btn btn-success">Add

                      </button>
                </form>
            </div>
        </div>
    </div>


@endsection