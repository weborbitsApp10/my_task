@extends('custom_view.layout')
@section('title', 'login')
@section('body')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                @if (Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops ! </strong> {{ session('danger') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card loginstyle">
                    <div class="card-body">
                        <h3 class="text-center mt-1 mb-5 fw-bold">Login</h3>
                        <form action="{{ url('/user-login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="name@example.com">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="*******">
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-info mt-3 mb-4">Login</button>
                        </form>
                    </div>
                    <a href="{{ route('sign-up-user') }}" class="signup"> Sign up here </a>
                </div>
            </div>
        </div>
    </div>
@endsection
