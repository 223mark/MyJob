@extends('employer.layouts.employermaster')
@section('content')
    <!-- hero section -->
    <section id="hero">

    </section>
    <section class="d-flex justify-content-end m-4" id="user-container">
        <a href="{{ route('employer#profile', $userData->id) }}"class=" px-2">
            <button class="btn btn-sm btn-success" type="submit">Update Profile</button>
        </a>
        <a href="{{ route('employer#changePswPage') }}">
            <button class="btn btn-sm btn-primary" type="submit">Change Password</button>
        </a>
    </section>
    <section class=" container mt-3 ">
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
                                            <img src="{{ asset('employerImage/' . Auth::user()->img) }}" alt="Cool Admin"
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
                                        <span class="text-info ">{{ $userData->name }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fa-solid fa-envelope me-2 "></i> Email
                                    </div>
                                    <div class="col-md-6">
                                        <span class=" text-danger">{{ $userData->email }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <i class="fa-solid fa-square-phone me-2 "></i> Phone
                                    </div>
                                    <div class="col-md-6">
                                        <span class=" text-warning">{{ $userData->phone }}</span>
                                    </div>

                                    <div class="col-md-4">
                                        <i class="fa-solid fa-location-dot me-2"></i> Address
                                    </div>
                                    <div class="col-md-6">
                                        <span class=" text-success">
                                            {{ $userData->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card w-100 ">
                    <div class="card-header">
                        Profile Status
                    </div>
                    <div class="card-body">
                        @if (Auth()->user()->img == null && Auth()->user()->aboutme == null)
                            <h5 class="text-danger"> 50% </h5>
                        @endif
                        @if (Auth()->user()->img != null && Auth()->user()->aboutme == null)
                            <h5 class="text-primary"> 70% </h5>
                        @endif
                        @if (Auth()->user()->img == null && Auth()->user()->aboutme != null)
                            <h5 class="text-primary"> 70% </h5>
                        @endif
                        @if (Auth()->user()->img != null && Auth()->user()->aboutme != null)
                            <h5 class="text-success"> 100% </h5>
                        @endif
                    </div>
                </div>
                <div class="card w-100 mt-2">
                    <div class="card-header">
                        About Company
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ route('user#aboutme', Auth()->user()->id) }}" class=" px-2">
                                <button class="btn btn-sm btn-info">Add</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
