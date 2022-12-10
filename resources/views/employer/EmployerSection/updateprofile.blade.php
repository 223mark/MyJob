@extends('employer.layouts.pureEmployerMaster')
@section('pure-content')
    <div class="container  my-6">

        <div class="card w-50 mx-auto my-4">
            <div class=" mt-3 d-flex justify-content-end">
                <a href="{{ route('employer#info') }}">
                    <button class="btn btn-dark text-white">Back</button>
                </a>
            </div>
            <div class="card-header ">
                <h5 class=" text-warning">Your Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('employer#updateProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="login-form">
                        <div class="row">
                            <div class="" hidden>
                                <div class="form-group">
                                    <label class="py-2">Company Name <span class=" text-muted">(UserName)</span> /
                                        Unchangable</label>
                                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
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
                                    <label class="py-2">Location</label>
                                    <input class="form-control" type="text" name="address" value="{{ $data->address }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="py-2">Image</label>
                                    <input class="form-control" type="file" name="img" value="{{ $data->img }}">
                                    @error('img')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
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
                        <div class="form-group mt-3">
                            <button class="btn btn-sm btn-success w-100" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
