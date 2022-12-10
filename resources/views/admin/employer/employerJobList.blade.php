@extends('admin.layouts.master')

@section('content')
    <section id="job-section" class=" p-5">
        <div class="container d-flex justify-content-end">
            <a href="{{ route('admin#employerList') }}">
                <button class="btn btn-sm btn-primary">Back</button>
            </a>
        </div>
        <table class="table table-hover bg-white border-gray-500">

            <th>
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Salary</th>
                    <th>Tag</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Job Delete</th>
                </tr>
            </th>
            <tbody>
                @foreach ($userData as $item)
                    <tr>
                        <td>{{ $item->job_title }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->salary }}</td>
                        <td>{{ $item->tags }}</td>
                        <td class="">{{ $item->location }}</td>
                        <td> {{ $item->description }}</td>
                        <th>
                            <a href="{{ route('admin#deletempJob', $item->id) }}"></a>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </th>
                    </tr>
            </tbody>
            @endforeach
        </table>
        <div class="d-flex justify-content-end">
            {{ $userData->links() }}
        </div>
    </section>
    <!-- job end -->
@endsection
