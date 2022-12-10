@extends('user.layouts.pureusermaster')

@section('pure-content')
    <div class="conatiner mt-md-5">

        <div class="card w-50 mx-auto">
            <div class="d-flex justify-content-end">
                <button class="btn btn-sm btn-primary">Back</button>
            </div>
            <div class="card-header">
                <h5>Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if ($data->img == null)
                            <img src="{{ asset('img/userdefault.png') }}" alt="" class="img-fluid"
                                style="max-height: 200px">
                        @else
                            <img src="{{ asset('userImage/' . $data->img) }}" alt="userimage" class="img-fluid"
                                style="max-height: 200px">
                        @endif

                    </div>
                    <div class="col-md-6">
                        <div class="row gap-2">
                            <div class="col-md-4">
                                Name
                            </div>
                            <div class="col-md-6">
                                {{ $data->name }}
                            </div>
                            <div class="col-md-4">
                                Email
                            </div>
                            <div class="col-md-6">
                                {{ $data->email }}
                            </div>
                            <div class="col-md-4">
                                Phone
                            </div>
                            <div class="col-md-6">
                                {{ $data->phone }}
                            </div>
                            <div class="col-md-4">
                                Address
                            </div>
                            <div class="col-md-6">
                                {{ $data->address }}
                            </div>
                            <div class="col-md-10">
                                <span class="me-2"> Bio :</span> {{ $data->bio }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-primary">{{ $data->aboutme }}</p>
            </div>
        </div>
    </div>
@endsection
