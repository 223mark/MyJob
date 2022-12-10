@extends('user.layouts.usermaster')


@section('content')
    <section id="hero">
        <div class="search-section" style="margin-top: 20px">
            <form action="{{ route('user#employerSearch') }}" method="POST">
                @csrf
                <input type="text" class="input-bar w-50" name="searchJob" placeholder="Search Company">
                <button type="submit" class="btn btn-primary"> Search <i class="fa-solid fa-magnifying-glass "></i></button>
            </form>

        </div>
    </section>

    <!-- job  -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($userData as $item)
                <div class="col-md-4">
                    <div class="card" style="height:350px;background-color: rgba(245, 233, 233, 0.747)">
                        <div class="bg-image hover-zoom" style="height:150px">
                            @if ($item->img != null)
                                <img src="{{ asset('employerImage/' . $item->img) }}" alt="company" class="img-fluid">
                            @else
                                <img src="{{ asset('img/Project.jpg') }}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $item->name }}</h5>
                            <p class="card-text">
                                <small class="d-block">
                                    <span class="text-muted"> email</span> : {{ $item->email }}
                                </small>
                                <small class="d-block">
                                    <span class="text-muted">phone</span> : {{ $item->phone }}
                                </small>
                                <small class="d-block">
                                    <span class="text-muted">address</span> : {{ $item->address }}
                                </small>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-around">
                            <a href="{{ route('employer#aboutme', $item->id) }}">
                                <button class="btn btn-sm btn-primary">View Detail</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-end">
            {{ $userData->links() }}
        </div>

    </div>
    <!-- job end -->
@endsection
