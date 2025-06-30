<table>
    <thead>
        <tr>
            <th colspan="5" align="center">User Data</th>
        </tr>
        <tr>
            <th colspan="5" align="center">
                Date : {{ $date }}
            </th>
        </tr>
        <tr>
            <th colspan="5" align="center">
                {{ $time }} O'clock
            </th>
        </tr>
    <tr>
        <th width="20" align="center">Number</th>
        <th width="20" align="center">Name</th>
        <th width="20" align="center">Email</th>
        <th width="20" align="center">Role</th>
        <th width="20" align="center">Task Status</th>
    </tr>
    </thead>
    <tbody>
        @foreach ( $user as  $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td align="center">{{ $item->role }}</td>
                @if ($item->is_tasks == false)
                    <td align="center">Not Assigned</td>
                @else
                    <td align="center">Assigned</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
