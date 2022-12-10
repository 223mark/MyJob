@extends('user.layouts.pureusermaster')


@section('pure-content')
    <div class="container px-5 my-5">
        <div class="row">
            <div class="card mx-auto w-75 bg-light text-dark">
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('user#jobalerts') }}">
                        <button class="btn btn-sm btn-primary">Back</button>
                    </a>
                </div>
                <div class="card-header text-center">
                    <h4 class="">Your Infomation</h4>
                </div>

                <form action="{{ route('user#applyData') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name" class="">Name</label>
                                <input type="text" id="name" name="name" class=" form-control"
                                    value="{{ Auth()->user()->name }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email" class="">Email</label>
                                <input type="email" id="email" class=" form-control" name="email"
                                    value="{{ Auth()->user()->email }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phonenumber" class="">Phone Number</label>
                                <input type="number" id="email" name="phoneNumber" class=" form-control"
                                    value="{{ Auth()->user()->phone }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="image" class="">CV Image</label>
                                <input type="file" name="image" id="email" class=" form-control"
                                    value="Enter Your Photo">
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="">Address</label>
                                <textarea name="address" cols="30" rows="3" class=" form-control">{{ Auth()->user()->address }}</textarea>
                            </div>
                        </div>
                        {{-- hidden input --}}
                        <div class="form-group mb-2" hidden>
                            <label for="name" class="">Id</label>
                            <input type="text" id="name" name="companyId" class=" form-control"
                                value="{{ $jobdata->company_id }}">
                        </div>
                        <div class="form-group mb-2" hidden>
                            <label for="name" class="">User Id</label>
                            <input type="text" id="name" name="userId" class=" form-control"
                                value="{{ Auth()->user()->id }}">
                        </div>
                        <div class="form-group mb-2" hidden>
                            <label class="">Job Id</label>
                            <input type="text" name="jobId" class=" form-control" value="{{ $jobdata->id }}">
                        </div>
                        {{-- hidden input end --}}
                    </div>
                    <div class="card-footer ">
                        <button class="btn btn-sm btn-success w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
