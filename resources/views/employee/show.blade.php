@extends('layout.app')

@section('section')


    <h1 class="text-center text-primary  display-3">Edit employees {{$emp->name}}</h1>


    <div class="container col-5">

        <div class="card">
            <img width="" src="{{ asset("imgs/$emp->Image") }}" alt="" srcset="">
            <div class="card-body">
                <h1>Name : {{$emp->name}}</h1>
                <h1>Salary : {{$emp->salary}}</h1>
                  <a href="{{ route('employee.edit', $emp->id) }}" class="btn btn-primary  btn-block">Edite </a>

            </div>
         </div>

    </div>

@endsection
