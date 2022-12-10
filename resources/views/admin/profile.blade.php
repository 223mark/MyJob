@extends('admin.layouts.master')

@section('content')
    <section class=" container mt-5">
        <div class="row">
            <div class="col-md-10">
                <div class="card w-100">
                    <div class="card-header">
                        <h5>Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    @if (Auth::user()->img == null)
                                        <img src="{{ asset('img/userdefault.png') }}" />
                                    @else
                                        <div>
                                            <img src="{{ asset('adminImage/' . Auth::user()->img) }}" alt="Cool Admin"
                                                class=" img-thumbnail " />
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8 mt-md-2">
                                <div class="row gap-2">
                                    <div class="col-md-4">
                                        <i class=" fa-solid fa-user me-2"></i> Name
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-info ">{{ $adminData->name }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fa-solid fa-envelope me-2 "></i> Email
                                    </div>
                                    <div class="col-md-6">
                                        <span class=" text-danger">{{ $adminData->email }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fa-solid fa-square-phone me-2 "></i> Phone
                                    </div>
                                    <div class="col-md-6">
                                        <span class=" text-warning">{{ $adminData->phone }}</span>
                                    </div>

                                    <div class="col-md-4">
                                        <i class="fa-solid fa-location-dot me-2"></i> Address
                                    </div>
                                    <div class="col-md-6">
                                        <span class=" text-success">
                                            {{ $adminData->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card w-100">
                    <div class="card-header">
                        Profile Status
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin#profileUpdatePage', Auth::user()->id) }}">
                            <button class="btn btn-sm btn-success " type="submit">Update Profile</button>
                        </a>
                    </div>
                </div>
                <div class="card w-100 mt-2">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ route('admin#pswChangePage') }}">
                                <button class="btn btn-sm  btn-primary" type="submit">Change</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
