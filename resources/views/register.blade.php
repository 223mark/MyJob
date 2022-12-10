@extends('master.master')
@section('title', 'Register Page')
@section('content')
    <style>
        #main-registerPage {
            background-image: url('img/jocitycv.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top 10% right 0;
        }
    </style>
    <div class="container mt-5 ">
        <div class="card w-75  mx-auto ">
            <div class="card-header">
                <h5 class=" text-warning">Register</h5>
            </div>
            <form action="{{ route('register') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="py-2">UserName/CompanyName</label>
                            <input class="form-control" type="text" name="name"
                                placeholder="UserName or Company Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="py-2">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="py-2">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="py-2">Phone</label>
                            <input class="form-control" type="number" name="phone" placeholder="Phone">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="py-2">Password</label>
                            <input class="form-control" type="password" name="password_confirmation"
                                placeholder="Confirm Password">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="py-2">Address</label>
                            <input class="form-control" type="text" name="address" placeholder="Address">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-2 col-lg-12">
                            <label for="">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="employer">Employer</option>
                                <option value="user">User</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-sm btn-primary" type="submit">Register</button>
                    <div class="register-link">
                        <p>
                            Already have account?
                            <a href="{{ route('admin#loginPage') }}">Sign In</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
