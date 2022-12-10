@extends('master.master')


@section('content')
    <!-- hero section -->
    <section id="hero">
        <h2 style="margin-bottom: 10px">Haven't Registered Yet? Join Us Now!!</h2>
        <a href="{{ route('employee#create') }}">
            <button class="main-btn">Sign In to Explore</button>
        </a>
    </section>
    <div class="container">
        <div class="row">
            @foreach ($jobdata as $item)
                <div class="col-5">
                    <span>
                        {{ $item->tags }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
