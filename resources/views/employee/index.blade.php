@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-2">
                <a href="{{route('employee.create')}}" class="btn btn-success">Add Employee</a>
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
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Company</th>
                            <th>Email</th>
                           <th>Phone</th>
                           <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($employees as $employee)
                            
                        <tr>
                            <td>{{$employee->firstname}}</td>
                            <td>{{$employee->lastname}}</td>
                            <td>{{$employee->company?->name}}</td>
                            <td>{{$employee->email}}</td>

                            <td>{{$employee->phone}}</td>

                            <td>
                                <a class="btn btn-primary" href="{{route('employee.edit',$employee->id)}}">Edit</a>

                                <form style="display: inline" action="{{route('employee.destroy',$employee->id)}}" method="post">
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