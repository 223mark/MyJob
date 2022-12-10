@extends('user.layouts.pureusermaster')
@section('pure-content')
    <div class="container mt-5">

        <div class="card w-50 mx-auto bg-light">
            <div class=" d-flex justify-content-end">
                <a href="{{ route('user#info') }}">
                    <button class="btn btn-sm btn-primary me-4 my-2
                ">Back</button>
                </a>
            </div>
            <div class="card-header">
                <h4 class="text-danger">Change Password</h4>
            </div>
            <form action="{{ route('user#pswChange') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="" class=" mb-2">Current Password</label>
                        <input type="password" name="currentPsw" class=" form-control" placeholder="Enter Current Password">
                        @error('currentPsw')
                            <div class=" text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (Session::has('notMachMessage'))
                            <div class=" text-danger mt-1">
                                {{ Session::get('notMachMessage') }}
                            </div>
                        @endif

                    </div>
                    <div class="form-group mb-2">
                        <label for="" class=" mb-2">New Password</label>
                        <input type="password" name="newPsw" class=" form-control" placeholder="Enter New Password">
                        @error('newPsw')
                            <div class=" text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class=" mb-2">Confirm Password</label>
                        <input type="password" name="confirmPsw" class=" form-control" placeholder="Enter Confirm Password">
                        @error('confirmPsw')
                            <div class=" text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
