@extends('user.layouts.pureusermaster')


@section('pure-content')
    <div class="container mt-3">

        <div class="card w-50 mx-auto ">
            <div class=" d-flex justify-content-end me-2 mt-3">
                <a href="{{ route('user#jobalerts') }}"><button class=" btn btn-sm btn-primary">Back</button></a>
            </div>
            <div class="card-header">
                <h4 class="text-white text-center bg-secondary ">Job Detail</h4>
            </div>
            <div class="card-body">
                <div class="row gap-3">
                    <div class="col-md-4">
                        <span class="card-text ">Job Title</span>
                    </div>
                    <div class="col-md-6">
                        <span class="bold  ">{{ $jobdata->job_title }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class=" card-text ">Company Name</span>
                    </div>
                    <div class="col-md-6">
                        <span class="bold ">{{ $jobdata->company_name }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class=" card-text ">Tags </span>
                    </div>
                    <div class="col-md-6">
                        <span class="bold ">{{ $jobdata->tags }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class=" card-text ">Job Location </span>
                    </div>
                    <div class="col-md-6">
                        <span class="bold ">{{ $jobdata->location }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class=" card-text">Description</span>
                    </div>
                    <div class="col-md-6">
                        {{ $jobdata->description }}
                    </div>
                    <div class="col-md-4">
                        <span class=" card-text">Email</span>
                    </div>
                    <div class="col-md-6">
                        {{ $jobdata->email }}
                    </div>
                    <div class="col-md-4">
                        <span>Job Type</span>
                    </div>
                    <div class="col-md-6">
                        {{ $jobdata->typeOfJob }}
                    </div>
                    <div class="col-md-4">
                        <span>Salary</span>
                    </div>
                    <div class="col-md-6">
                        {{ $jobdata->salary }}
                    </div>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-around">
                <a href="{{ route('user#applyPage', $jobdata->id) }}"><button
                        class="btn btn-sm btn-success">Apply</button></a>
                <a href="{{ route('employer#aboutme', $jobdata->company_id) }}"><button class="btn btn-sm btn-primary">View
                        Company</button></a>
            </div>

        </div>
    </div>
@endsection
