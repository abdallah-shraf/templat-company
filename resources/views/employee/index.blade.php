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

    <h1 class="text-center text-primary">Welcom employees</h1>

    <div class="container col-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark text-center">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th colspan="2 ">Action</th>
                    </tr>
                    @foreach ($emp as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->salary}}</td>

                            <td >
                                <a href="{{ route('employee.show', $item->id) }}" class="btn btn-primary">Show </a>
                            </td>
                            <td >
                               {{-- <a href="{{ route('employee.destroy', $item->id) }}" class="btn btn-primary">Dleat</a>--}}
                               <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger" value="Deleat">
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
