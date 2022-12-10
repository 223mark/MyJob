@extends('employer.layouts.pureEmployerMaster')

@section('pure-content')
    <div class="container mt-3">
        <div class="card bg-light mx-auto w-50 ">
            <div class="card-header">
                <h4 class="text-danger text-center">Post Job</h4>
            </div>
            <form action="{{ route('employer#createJob') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form">
                        <label for="jobTitle">Job Title</label>
                        <input type="text" name="jobTitle" id="jobTitle" class=" form-control mt-2 mb-2"
                            placeholder="Enter Job Position" value="{{ old('jobTitle') }}">
                        @error('jobTitle')
                            <div class="mt-1 text-danger fs-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form">
                        <label for="tags">Tags(what you need: exp laravel,vue,api)</label>
                        <input type="text" name="tags" id="tags" class=" form-control mt-2 mb-2"
                            placeholder="laravel,vue,api,..," value="{{ old('tags') }}">
                        @error('tags')
                            <div class="mt-1 text-danger fs-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form">
                        <label for="location">Job Location</label>
                        <input type="text" name="location" id="location" class=" form-control mt-2 mb-2"
                            placeholder="Job Location" value="{{ old('location') }}">
                        @error('location')
                            <div class="mt-1 text-danger fs-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form">
                        <label for="Salary">Salary</label>
                        <input type="text" name="salary" id="Salary" class=" form-control mt-2 mb-2"
                            placeholder="**** or Nego" value="{{ old('salary') }}">
                        @error('salary')
                            <div class="mt-1 text-danger fs-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form">
                        <label for="">Description</label>
                        <select name="description" class="form-control" value="{{ old('description') }}">
                            <option value="">Choose Description</option>
                            <option value="Remote">Remote</option>
                            <option value="Office">Office</option>
                            <option value="Freelance">Freelance</option>
                        </select>
                        @error('description')
                            <div class="mt-1 text-danger fs-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form mt-2">
                        <label for="typeOfJob">Type Of Jobs</label>
                        <select name="typeOfJob" class="form-control" value="{{ old('typeOfJob') }}">
                            <option value="">Choose Job Types</option>
                            <option value="frontend">Frontend</option>
                            <option value="backend">Backend</option>
                            <option value="fullstack">FullStack</option>
                        </select>

                        @error('typeOfJob')
                            <div class="mt-1 text-danger fs-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form mt-3">
                        <button type="submit" class="btn btn-sm btn-danger w-100">Post</button>
                    </div>
                </div>
            </form>
            <div class="card-footer">
                <a href="{{ route('employer#jalerts') }}">
                    <button class="btn btn-sm btn-dark w-100">Back</button>
                </a>
            </div>


        </div>
    </div>
@endsection
