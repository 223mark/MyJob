@extends('employer.layouts.employermaster')

@section('content')
    <section id="hero">

    </section>
    <div class="container d-flex justify-content-around px-2 py-4 my-4">
        <div class="">
            <img src="{{ asset('img/job-cv.webp') }}" alt="" style="width:450px;height:220px">
        </div>
        <div class=" px-4 py-3">
            <p style="height: 80%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab nemo quibusdam expedita sunt.
                Totam quasi cumque
                et
                ea, debitis nostrum libero? Doloremque quis laboriosam veniam, ipsam blanditiis maxime dolore nesciunt
                facilis
                quisquam rem distinctio fugiat!</p>
            <a href="{{ route('user#read') }}"><button class="btn bg-danger text-white ">Read More</button></a>
        </div>
    </div>
@endsection
