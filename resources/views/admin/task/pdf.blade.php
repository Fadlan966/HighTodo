<table class="table" style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr>
            <th colspan="7" style="background-color: #4e73df; color: white; text-align: center; padding: 15px; font-size: 18px;">
                <i class="fas fa-tasks mr-2"></i>TASK REPORT
            </th>
        </tr>
        <tr>
            <th colspan="7" style="text-align: center; padding: 10px; background-color: #f8f9fc;">
                Generated on: {{ $date }} at {{ $time }}
            </th>
        </tr>
        <tr style="background-color: #f8f9fc;">
            <th style="width: 5%; text-align: center; padding: 12px; border-bottom: 2px solid #e3e6f0;">No</th>
            <th style="width: 20%; padding: 12px; border-bottom: 2px solid #e3e6f0;">Employee</th>
            <th style="width: 25%; padding: 12px; border-bottom: 2px solid #e3e6f0;">Email</th>
            <th style="width: 25%; padding: 12px; border-bottom: 2px solid #e3e6f0;">Task Description</th>
            <th style="width: 10%; padding: 12px; border-bottom: 2px solid #e3e6f0; text-align: center;">Start Date</th>
            <th style="width: 10%; padding: 12px; border-bottom: 2px solid #e3e6f0; text-align: center;">End Date</th>
            <th style="width: 5%; padding: 12px; border-bottom: 2px solid #e3e6f0; text-align: center;">Days</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($task as $item)
            @php
                $startDate = \Carbon\Carbon::parse($item->start_date);
                $endDate = \Carbon\Carbon::parse($item->end_date);
                $duration = $startDate->diffInDays($endDate) + 1;
            @endphp
            <tr style="border-bottom: 1px solid #e3e6f0;">
                <td style="text-align: center; padding: 10px; vertical-align: middle;">{{ $loop->iteration }}</td>
                <td style="padding: 10px; vertical-align: middle;">
                    <strong>{{ $item->user->name }}</strong>
                </td>
                <td style="padding: 10px; vertical-align: middle;">{{ $item->user->email }}</td>
                <td style="padding: 10px; vertical-align: middle;">{{ $item->task }}</td>
                <td style="text-align: center; padding: 10px; vertical-align: middle;">
                    {{ $startDate->format('d M Y') }}
                </td>
                <td style="text-align: center; padding: 10px; vertical-align: middle;">
                    {{ $endDate->format('d M Y') }}
                </td>
                <td style="text-align: center; padding: 10px; vertical-align: middle;">
                    <span class="badge badge-primary">{{ $duration }} day{{ $duration > 1 ? 's' : '' }}</span>
                </td>
            </tr>
        @endforeach
    </tbody>
    <t
