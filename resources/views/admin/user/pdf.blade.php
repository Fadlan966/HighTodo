<table class="table table-bordered" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f8f9fa;">
            <th colspan="5" style="text-align: center; padding: 10px; font-size: 18px; font-weight: bold;">User Data</th>
        </tr>
        <tr>
            <th colspan="5" style="text-align: center; padding: 8px;">
                Date : {{ $date }} | {{ $time }}
            </th>
        </tr>
        <tr style="background-color: #e9ecef;">
            <th style="width: 5%; text-align: center; padding: 8px;">No</th>
            <th style="width: 25%; padding: 8px;">Name</th>
            <th style="width: 30%; padding: 8px;">Email</th>
            <th style="width: 20%; text-align: center; padding: 8px;">Role</th>
            <th style="width: 20%; text-align: center; padding: 8px;">Task Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr style="border-bottom: 1px solid #dee2e6;">
                <td style="text-align: center; padding: 8px;">{{ $loop->iteration }}</td>
                <td style="padding: 8px;">{{ $item->name }}</td>
                <td style="padding: 8px;">{{ $item->email }}</td>
                <td style="text-align: center; padding: 8px;">{{ $item->role }}</td>
                <td style="text-align: center; padding: 8px;">
                    @if ($item->is_tasks)
                        <span style="background-color: #d4edda; color: #155724; padding: 3px 8px; border-radius: 4px;">Assigned</span>
                    @else
                        <span style="background-color: #f8d7da; color: #721c24; padding: 3px 8px; border-radius: 4px;">Not Assigned</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
