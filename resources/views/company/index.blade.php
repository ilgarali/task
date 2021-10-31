@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-2">
                <a href="{{route('company.create')}}" class="btn btn-success">Add Company</a>
                @if (session('success'))
                    <div class="alert alert-success my-3">
                        {{session('success')}}
                    </div>
                @endif
            </div>
            
            <div class="col-md-12">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($companies as $company)
                            
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>@if ($company->logo != null)
                                <img src="{{asset('storage/' . $company->logo)}}" width="100" height="100" alt="">
                            @endif
                         </td>
                            <td>{{$company->website}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('company.edit',$company->id)}}">Edit</a>

                                <form style="display: inline" action="{{route('company.destroy',$company->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-danger" href="">Delete</button>

                                </form>
                            
                            </td>
                        </tr>
                        @endforeach
                       
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    $('#example').DataTable({
        "order": [[ 1, "desc" ]]
    } );
} );
    </script>
@endsection