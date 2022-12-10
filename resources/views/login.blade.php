@extends('master.master')

@section('content')
    <style>
        #main-loginPage {
            background-image: url('img/jocitycv.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top 10% right 0;
        }
    </style>
    <div class="container-fluid d-flex justify-content-center align-items-center" id="main-loginPage" style="height: 100vh">
        <div class=" mx-auto  w-50">
            <div class="card py-5">
                <div class="card-header">
                    <h5 class="text-warning">Login Page</h5>
                </div>
                <div class="card-body">
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="py-2">Email </label>
                                <input class="form-control" type="email" name="email" placeholder="Email">
                                @error('email')
                                    <div class="text-danger fs-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="py-2">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                @error('password')
                                    <div class="text-danger fs-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn btn-sm bg-success my-3 text-white" type="submit">sign
                                in</button>

                        </form>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="register-link">
                        <p>
                            Don't you have account?
                            <a href="{{ route('auth#registerPage') }}">Sign Up Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
