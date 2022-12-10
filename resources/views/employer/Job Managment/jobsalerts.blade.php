@extends('employer.layouts.employermaster')
@section('content')
    @if (Session::has('respondMessage'))
        <div class="alert alert-success alert-dismissible fade show mt-2 mx-4" role="alert">
            {{ Session::get('respondMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container my-4 d-flex justify-content-around flex-wrap">
        <table class="table bg-white">
            <th>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone </th>
                    <th>Address</th>
                    <th>Set Status</th>
                    <th></th>
                </tr>
            </th>
            <tbody>


                <tr>
                    @foreach ($jobdata as $item)
                        <td>{{ $item->name }}</td>
                        <td class="col-2">
                            <img src="{{ asset('uploads/' . $item->image) }}" alt="CV Image" class=" img-fluid"
                                style="max-height:100px">
                        </td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <form action="{{ route('employer#jobRespond', $item->id) }}" method="POST">
                                @csrf
                                <div class=" d-flex">
                                    <select name="status" class=" form-control bold">
                                        @if ($item->status == null)
                                            <option value="">Choose</option>
                                            <option value="Accept">Accept</option>
                                            <option value="Decline">Decline</option>
                                            @error('status')
                                                <div class="text-danger mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <option value="{{ $item->status }}" selected>
                                                {{ $item->status }}
                                            </option>
                                            <option value="Accept">Accept</option>
                                            <option value="Decline">Decline</option>
                                            @error('status')
                                                <div class="text-danger mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    </select>
                                    <div class=" mt-1">
                                        <button class="btn btn-sm btn-primary" type="submit">Set</button>
                                    </div>
                                </div>

                            </form>
                        </td>
                        <td>
                            <a href="{{ route('employer#jrespondPage', $item->id) }}">
                                <button class="btn btn-sm btn-info">View</button>
                            </a>

                        </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{-- </table>
        <div class="d-flex justify-content-end">
            {{ $jobdata->links() }} --}}
        @if (count($jobdata) == 0)
            <div class="mt-4">
                <p>Post First !</p>
                <hr>
                <a href="{{ route('employer#create') }}"><button class="btn bg-danger text-white">Post Job</button></a>
            </div>
            <div class=" bg-light mt-4" style="padding:10px 20px; border:1px solid red; border-radius:5px">
                <h1>there is no <span class="text-danger">applications</span> yet</h1>
            </div>
        @endif


        <!-- job end -->
    </div>
@endsection
