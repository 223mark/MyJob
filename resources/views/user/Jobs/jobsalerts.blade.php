@extends('user.layouts.usermaster')


@section('content')
    <section id="hero" class="mb-5">
        <div class="search-section" style="margin-top: 20px">
            <form action="{{ route('user#jobsearch') }}" method="POST" class=" d-flex justify-content-center">
                @csrf
                <input type="text" class="form-control w-50 d-inline-block" name="searchJob" placeholder="Search Your Job">
                <button type="submit" class="btn btn-sm btn-primary"> Search <i
                        class="fa-solid fa-magnifying-glass "></i></button>
            </form>
        </div>
    </section>
    {{-- user search job --}}

    {{-- search job end --}}
    <div class="container mt-4">

        <div class="row">
            @if (count($jobdata) == 0)
                <div class=" my-5 text-center">
                    <h3>There is no <span class="text-danger mx-2">Job</span>yet.</h3>
                </div>
            @endif
            {{-- job --}}
            @foreach ($jobdata as $item)
                <div class="col-md-4 ">
                    <div class="card w-100 " style="background-color: rgba(245, 233, 233, 0.747)">
                        <div class="card-body">
                            <h5 class="card-title bold">{{ $item->job_title }}</h5>
                            <h6 class="card-text ">{{ $item->company_name }}</h6>
                            <h6 class="card-text text-secondary ">{{ $item->email }}</h6><br>
                            <h6 class="card-text">{{ $item->location }}</h6>
                            <a href="{{ route('user#filterJobType', $item->tags) }}">
                                <h6 class="card-text text-primary ">{{ $item->tags }}</h6>
                            </a>
                            <hr>
                            <h6 class="card-text  my-2">
                                <a href="{{ route('user#filterJobType', $item->typeOfJob) }}">
                                    <span class="search-tag">{{ $item->typeOfJob }}</span>
                                </a>
                                <a href="{{ route('user#filterJobs', $item->description) }}">
                                    <span class="search-tag">{{ $item->description }}</span></a>

                            </h6>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="{{ route('user#jobInfoPage', $item->id) }}"><button
                                    class="btn btn-sm bg-primary text-white">See
                                    More</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- job end --}}
        </div>
    </div>
    <div class="container d-flex justify-content-end ">
        {{ $jobdata->links() }}
    </div>
@endsection
