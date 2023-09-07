@extends('custom_view.layout')
@section('title', 'Dashboard panel')
@section('body')

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TASK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
                <div class="d-flex">
                    <h6 class="me-4 mt-2">{{ ucwords(Auth::user()->name) }}</h6>
                    <a href="{{ url('/user-logout') }}" class="btn btn-sm btn-outline-danger">Logout</a>
                </div>
            </div>
    </nav>

    <div class="container">
        <div class="card loginstyle mt-5">
            <div class="card-header">
                <h5>User Details</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Date of birth</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userRecord as $key => $value)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ ucwords($value->name) }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->mobile }}</td>
                                <td>{{ date_format(date_create($value->dob),"d M, Y")  }}</td>
                                <td>{{ $value->gender }}</td>
                                <td>{{ $value->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
   
@endsection



