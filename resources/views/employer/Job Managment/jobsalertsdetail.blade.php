@extends('employer.layouts.pureEmployerMaster')

@section('pure-content')
    <div class="container mt-5">
        {{-- mdb card --}}
        <div class="card w-50 mb-3 mx-auto">
            <div class=" d-flex justify-content-end">
                <a href="{{ route('employer#jalerts') }}">
                    <button class="btn btn-sm btn-dark">
                        Back
                    </button>
                </a>
            </div>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('uploads/' . $jobdata->image) }}" alt="CV Form" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Employer Information</h5>
                        <p class="card-text">
                            {{ $jobdata->name }}
                            </>
                        <p class="">
                            <small class=" d-block">
                                Email : {{ $jobdata->email }}
                            </small>
                            <small class=" d-block">
                                Phone: {{ $jobdata->phone_number }}
                            </small>
                            <small class=" d-block">
                                Address : {{ $jobdata->address }}
                            </small>
                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('employer#jobRespond', $jobdata->id) }}" method="POST">
                            @csrf
                            <div class="" hidden>
                                <label for=""></label>
                                <input type="text" name="date" value="{{ $jobdata->created_at }}">
                            </div>
                            <div class="">
                                <label for="" class=" mb-2" class="">Respond</label>
                                <select name="respond" class=" form-control bold">
                                    <option value="">Choose</option>
                                    <option value="Accept">Accept</option>
                                    <option value="Decline">Decline</option>
                                    @error('respond')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </select>
                            </div>
                            <div class="mt-2 d-flex justify-content-center">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- mdb card end --}}
    </div>
@endsection
