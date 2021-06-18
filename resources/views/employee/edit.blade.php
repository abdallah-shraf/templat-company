@extends('layout.app')

@section('section')

     @if (Session::has('done'))

        <div class="alert alert-success  alert-dismissible fade show"role="alert">
            <h2>{{Session::get('done')}}</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <h1 class="text-center text-primary  display-3">Edit employees {{$emp->name}}</h1>


    <div class="container col-6">


            @if ($errors->any())
                <div class="alert alert-danger alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="card">
                <div class="card-body">
                    <form action="{{route('employee.update', $emp->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Employee Name</label>
                            <input type="text" name="empName" value="{{$emp->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >Employee Salary</label>
                            <input type="text" name="empSalary"value="{{$emp->salary}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label >Employee Image</label>
                            <input type="file" name="image_Data" class="form-control">
                        </div>
                        {{method_field('PUT')}}
                        <button type="submit" class="btn btn-primary btn-block">Ubdate Data</button>

                    </form>
                </div>
            </div>

    </div>

@endsection
