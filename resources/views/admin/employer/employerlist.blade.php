@extends('admin.layouts.master')

@section('content')
    <section id="job-section" class=" p-5">
        <span class="fs-5 ml-5">Total - {{ $userData->total() }}</span>
        <table class="table table-hover bg-white border-gray-500">

            <th>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Jobs</th>
                    <th>Info</th>
                    <th>Account Delete</th>
                </tr>
            </th>
            <tbody>

                @foreach ($userData as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class=" text-indigo-500">{{ $item->name }}</td>
                        <td class=" text-success">{{ $item->email }}</td>
                        <td class=" text-secondary">{{ $item->phone }}</td>
                        <td class=" text-warning">{{ $item->address }}</td>
                        <td class="">
                            <a href="{{ route('admin#empoyerJoblist', $item->id) }}">
                                <button class="btn btn-sm btn-success">Jobs</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('employer#aboutme', $item->id) }}">
                                <button class="btn btn-sm bg-secondary text-white">View</button>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <button class="btn btn-sm btn-danger">X</button>
                            </a>
                        </td>
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
