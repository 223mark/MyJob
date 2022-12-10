@extends('employer.layouts.employermaster')


@section('content')
    <section id="hero">
        <div class="search-section" style="margin-top: 20px">
            <form action="{{ route('employer#search') }}" method="POST">
                @csrf
                <input type="text" class="input-bar w-50" name="searchJob" placeholder="Search Your Job">
                <button type="submit" class="btn btn-warning"> Search <i class="fa-solid fa-magnifying-glass "></i></button>
            </form>

        </div>
    </section>

    </div>

    <!-- job  -->
    <section class="container mt-3">
        {{-- alert section start --}}
        @if (Session::has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                {{ Session::get('updateSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                {{ Session::get('deleteSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('jobMessage'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ Session::get('jobMessage') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- alert section end --}}
        <div class="">
            <span class="fs-5 mx-3">Total - {{ $jobdata->total() }}</span>
            <a href="{{ route('employer#otherJoblist') }}">
                <button class="btn btn-sm btn-primary">Others</button>
            </a>
        </div>
        <table class="table bg-white border-gray-500">
            <th>
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Tags</th>
                    <th>Job Location</th>
                    {{-- <th>Email</th> --}}
                    <th></th>
                </tr>
            </th>
            <tbody>

                @if (count($jobdata) == 0)
                    <tr>
                        <td colspan="7" class=" text-center">
                            <small class="text-muted text-center fs-5">There is no Data</small>
                        </td>
                    <tr>
                @endif
                <tr>
                    @foreach ($jobdata as $item)
                        <td>{{ $item->job_title }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->tags }}</td>
                        <td>{{ $item->location }}</td>
                        {{-- <td>{{ $item->email }}</td> --}}
                        <td>
                            @if ($item->company_id == Auth()->user()->id)
                                <a href="{{ route('employer#jobinfo', $item->id) }}">
                                    <button type="submit" class="btn btn-sm btn-success">Info</button>
                                </a>
                                <a href="{{ route('employer#edit', $item->id) }}"><button
                                        class="btn btn-sm btn-info">Edit</button>
                                </a>
                                <a href="{{ route('employer#delete', Auth()->user()->id) }}">
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </a>
                            @else
                                <div class="">
                                    <small class=" text-muted">You can't manage other's.</small>
                                </div>
                            @endif
                        </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $jobdata->links() }}
        </div>
    </section>
    <!-- job end -->
@endsection
