    <section id="job-section" class=" p-5">

        <table class="table table-hover bg-white border-gray-500">

            <th>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th> Address</th>
                    <th>Created</th>
                    <th></th>
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
                        <td class=" text-info">{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('admin#employerDetail', $item->id) }}">
                                <button class="btn btn-sm bg-secondary text-white">View</button>
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
