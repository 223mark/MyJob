@extends('user.layouts.pureusermaster')
@section('pure-content')
    <div class=" d-flex justify-content-end" style="padding: 20px 100px">
        <a href="{{ route('user#info', Auth()->user()->id) }}">
            <button class="btn btn-sm btn-primary">
                Back
            </button>
        </a>
    </div>
    <section class="container bg-white">
        @if (Session::has('applySuccess'))
            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                {{ Session::get('applySuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-hover border-5 text-dark">
            <th>
                <tr>
                    <th>User Name</th>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>

                    </th>
                </tr>
            </th>
            <tbody>

                @if (count($messageData) == 0)
                    <tr>
                        <td colspan="7" class="text-cetner"> There are no messages yet</td>
                    </tr>
                @endif
                @foreach ($messageData as $item)
                    <tr>


                        <td class=" ">{{ $item->name }}</td>
                        <td>{{ $item->job_title }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td class=" ">{{ $item->salary }}</td>
                        <td class=" ">
                            @if ($item->apply_status == '')
                                <p class=" text-warning bold">Pending</p>
                            @endif
                            @if ($item->apply_status == 'Accept')
                                <p class=" text-success bold">Accept</p>
                            @endif
                            @if ($item->apply_status == 'Decline')
                                <p class=" text-danger bold">Decline</p>
                            @endif
                        </td>
                        {{-- <td class="">{{ $item->created_at->diffForHumans() }}</td> --}}
                        <td class="col-2">{{ $item->created_at->format('d / m / Y') }}</td>
                        <td>
                            <a href="#">
                                <button class="btn btn-sm bg-danger text-white">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="d-flex justify-content-end">
            {{ $messageData->links() }}
        </div>
    </section>
@endsection
