@extends('custom_view.layout')
@section('title', 'User registration')
@section('body')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
                @if (Session::has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Success</strong> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card loginstyle">
                    <div class="card-body">
                        <h3 class="text-center mt-1 mb-3 fw-bold">Registration form</h3>
                        <form action="{{ url('/user-register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Name here"
                                    oninput="this.value = this.value.replace(/[^a-z,A-Z ]/, '')"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address *</label>
                                <input type="email" class="form-control" name="email" placeholder="name@example.com"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile no</label>
                                <input type="text" class="form-control" name="mobile" id="phone"
                                    placeholder="Phone no"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="{{ old('mobile') }}">
                                @error('mobile')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password *</label>
                                <input type="password" class="form-control" name="password" placeholder="*******">
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control" name="c_password" placeholder="*******">
                                @error('c_password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date of birth *</label>
                                <input type="date" class="form-control" name="dob" placeholder="DD/MM/YY"
                                    value="{{ old('dob') }}">
                                @error('dob')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option value=" " hidden>-- Select gender * --</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                            @error('gender')
                                <span class="error">{{ $message }}</span>
                            @enderror
                            <div class="mb-3 mt-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="3" name="address">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-info mt-3 mb-4">Sign up</button>
                        </form>
                    </div>
                    <a href="{{ url('/') }}" class="signup"> Login here </a>
                </div>
            </div>
        </div>
    </div>
@endsection
