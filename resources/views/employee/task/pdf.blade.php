<table class="table" style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <thead>
        <tr>
            <th colspan="3" style="background-color: #4e73df; color: white; text-align: center; padding: 15px; font-size: 18px;">
                <i class="fas fa-tasks mr-2"></i>TASK DETAIL REPORT
            </th>
        </tr>
        <tr>
            <th colspan="3" style="text-align: center; padding: 10px; background-color: #f8f9fc;">
                Generated on: {{ $date }} at {{ $time }}
            </th>
        </tr>
    </thead>
    <tbody>
        <tr style="background-color: #f8f9fc;">
            <th style="width: 30%; padding: 12px; border-bottom: 2px solid #e3e6f0;">Field</th>
            <th style="width: 5%; padding: 12px; border-bottom: 2px solid #e3e6f0;"></th>
            <th style="width: 65%; padding: 12px; border-bottom: 2px solid #e3e6f0;">Details</th>
        </tr>
        <tr style="border-bottom: 1px solid #e3e6f0;">
            <td style="padding: 10px; vertical-align: middle;"><strong>Employee Name</strong></td>
            <td style="text-align: center; padding: 10px; vertical-align: middle;">:</td>
            <td style="padding: 10px; vertical-align: middle;">{{ $task->user->name }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e3e6f0;">
            <td style="padding: 10px; vertical-align: middle;"><strong>Email</strong></td>
            <td style="text-align: center; padding: 10px; vertical-align: middle;">:</td>
            <td style="padding: 10px; vertical-align: middle;">
                <span style="background-color: #4e73df; color: white; padding: 3px 8px; border-radius: 4px;">
                    {{ $task->user->email }}
                </span>
            </td>
        </tr>
        <tr style="border-bottom: 1px solid #e3e6f0;">
            <td style="padding: 10px; vertical-align: middle;"><strong>Task Description</strong></td>
            <td style="text-align: center; padding: 10px; vertical-align: middle;">:</td>
            <td style="padding: 10px; vertical-align: middle;">{{ $task->task }}</td>
        </tr>
        <tr style="border-bottom: 1px solid #e3e6f0;">
            <td style="padding: 10px; vertical-align: middle;"><strong>Start Date</strong></td>
            <td style="text-align: center; padding: 10px; vertical-align: middle;">:</td>
            <td style="padding: 10px; vertical-align: middle;">
                <span style="background-color: #1cc88a; color: white; padding: 3px 8px; border-radius: 4px;">
                    {{ $task->start_date }}
                </span>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; vertical-align: middle;"><strong>End Date</strong></td>
            <td style="text-align: center; padding: 10px; vertical-align: middle;">:</td>
            <td style="padding: 10px; vertical-align: middle;">
                <span style="background-color: #f6c23e; color: black; padding: 3px 8px; border-radius: 4px;">
                    {{ $task->end_date }}
                </span>
            </td>
        </tr>
    </tbody>
</table>

<!-- Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
