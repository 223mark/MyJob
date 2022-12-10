@extends('user.layouts.pureusermaster')
@section('pure-content')
    <div class="container-fluid  mt-4">


        @if (Session()->has('updateSuccess'))
            <div class=" fixed-top text-danger fs-3 bg-white">
                <p>
                    {{ Session('updateSuccess') }}
                </p>
            </div>
        @endif
        <div class="card w-50 mx-auto">
            <div class=" d-flex justify-content-end px-4 ">
                <a href="{{ route('user#info') }}">
                    <button class="btn btn-sm btn-primary mt-2 ">Back</button>
                </a>
            </div>
            <div class="card-header  text-center">
                <h5 class=" text-secondary">Your Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('user#updateProfile', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="login-form">
                        @error('terms')
                            <small class=" text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">User Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $data->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">Phone</label>
                                    <input class="form-control" type="number" name="phone" value="{{ $data->phone }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">Image</label>
                                    <input class="form-control" type="file" name="img" value="Image">
                                    @error('img')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">Address</label>
                                    <input class="form-control" type="text" name="address" value="{{ $data->address }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">Bio</label>
                                    <input class="form-control" type="text" name="bio" value="{{ $data->bio }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="py-2">About Me</label>
                                    <textarea name="aboutme" cols="30" rows="5" class="form-control">
                                        {{ $data->aboutme }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <button class="btn btn-sm btn-success w-100 mt-3 " type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
