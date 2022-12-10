@extends('admin.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center  align-items-center">

        <div class="card w-50 py-4 bg-light">
            <div class="mb-4 d-flex justify-content-end">
                <a href="{{ route('admin#profile') }}">
                    <button class="btn btn-warning
                ">Back</button>
                </a>
            </div>
            <div class="card-header">
                <h4 class="text-danger">Change Password</h4>
            </div>
            <form action="{{ route('admin#changePassword') }}" method="POST">
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
                <div class="card-footer">
                    <button class="btn btn-danger btn-sm w-100" type="submit">Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
