@extends('employer.layouts.employermaster')


@section('content')
    <section id="hero">
        <h2 style="margin-bottom: 10px"><span class=" text-danger fs-1">Explore</span> and Earn New Employers!!</h2>
    </section>
    {{-- login section --}}
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-4 bg-primary">

                </div>
                <div class="col-4 bg-white"></div>
                <div class="col-4 bg-success"></div>
            </div>
        </div>
    </section>
    {{-- login end --}}
    {{-- our parterner --}}
    <section id="partener" class="container " style="margin-top: 20px">
        <div class="">
            <h4>Our Parterners</h4>
        </div>
        <div class="container  d-flex flex-col">
            <div class=" p-3 " style="max-width:20%; height:150px">
                <img src="{{ asset('img/logo1.png') }}" alt="" class=" img-thumbnail ">
            </div>
            <div class=" p-3" style="max-width:20%; height:150px">
                <img src="{{ asset('img/logo3.png') }}" alt="" class=" img-thumbnail ">
            </div>
            <div class=" p-3" style="max-width:20%; height:150px">
                <img src="{{ asset('img/logo3.png') }}" alt="" class=" img-thumbnail ">
            </div>
            <div class=" p-3" style="max-width:20%; max-height:150px">
                <img src="{{ asset('img/logo1.png') }}" alt="" class=" img-thumbnail ">
            </div>
            <div class=" p-3" style="max-width:20%; max-height:150px">
                <img src="{{ asset('img/logo3.png') }}" alt="" class=" img-thumbnail ">
            </div>
        </div>
    </section>
    {{-- our parterner end --}}
    {{-- about us --}}
    <section class=" px-6 py-3">
        <div id="about-us" class="container mt-5">
            <div class='text-primary my-7'>About Us
            </div> <br>
            <div class="row">
                <div class="col-5">
                    <img src="{{ asset('img/cvjob.jpg') }}" alt="" class="w-100">
                </div>
                <div class="col-7 ">
                    <p class=" text-primary">The biggest jobseeker website in myanmar bla bla Lorem ipsum dolor sit
                        amet
                        consectetur adipisicing elit.
                        Dolorem repudiandae eius, in quae numquam sit ea. Aspernatur et laudantium a.</p>
                    <p class=" text-primary pt-1">Our email: <span class="text-muted">myJob@gmail.com</span></p>
                    <p class=" text-primary pt-1">Our loctaion <span class="text-muted">No.7 Arthrka Road Yankin,Yangon,
                            Myanmar</span></p>
                </div>
            </div>
        </div>
    </section>
@endsection
