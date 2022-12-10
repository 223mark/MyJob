@extends('admin.layouts.master')
@section('content')
    <div class="container  my-6">
        <div class="card w-50 mx-auto my-4">
            <form action="{{ route('admin#update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header ">
                    <h5 class=" text-warning">Your Information</h5>
                </div>

                <div class="card-body">
                    <div class="login-form">
                        @error('terms')
                            <small class=" text-danger">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <label class="py-2">Admin Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="py-2">Email</label>
                            <input class="form-control" type="email" name="email" value="{{ $data->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="py-2">Phone</label>
                            <input class="form-control" type="number" name="phone" value="{{ $data->phone }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="py-2">Image</label>
                            <input class="form-control" type="file" name="img">
                            @error('img')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="py-2">Location</label>
                            <input class="form-control" type="text" name="address" value="{{ $data->address }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="form-group ">
                        <button class="btn btn-sm btn-success w-100" type="submit">Update</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
