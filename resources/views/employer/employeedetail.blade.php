@extends('employer.employermaster')


@section('content')
    <section class=" bg-light  m-5 align-content-center">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('employer#jobList') }}"><button class="main-btn">Back</button></a>
            </div>
            <div class="col-10" style="padding: 0px 300px">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-white text-center bg-secondary ">Job Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class=" pt-1 pb-1">
                            <span>ID: {{ $jobdata->id }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Job Title: {{ $jobdata->job_title }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Company Name: {{ $jobdata->company_name }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Tags: {{ $jobdata->tags }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Job Location: {{ $jobdata->location }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Description: {{ $jobdata->description }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Email: {{ $jobdata->email }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Website: {{ $jobdata->website }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Updated Date: {{ $jobdata->updated_at }}</span>
                        </div>
                        <div class=" pt-1 pb-1">
                            <span>Created Date: {{ $jobdata->created }}</span>
                        </div>
                    </div>
                    <div class="card-footer"></div>

                </div>
            </div>
        </div>

    </section>
@endsection
