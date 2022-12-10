@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('admin#postBlog') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-10">
                    <div class="form">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class=" form-control mt-2 mb-2"
                            value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <p class="text-danger"> {{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="form">
                        <label for="jobTitle" class=" mb-2">Blog</label>
                        <textarea name="blog" id="" cols="30" rows="10" class=" form-control"></textarea>
                        @if ($errors->has('jobTitle'))
                            <p class="text-danger"> {{ $errors->first('jobTitle') }}</p>
                        @endif
                    </div>
                    <div class="form">
                        <label for="jobTitle">Image</label>
                        <input type="file" name="image" id="image" class=" form-control mt-2 mb-2"
                            value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <p class="text-danger"> {{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-2 mt-5">
                    <button class="btn btn-lg bg-secondary text-white" type="submit">Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection
