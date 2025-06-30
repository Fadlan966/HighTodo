<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TaskExport implements FromView
{
    public function view(): View
    {
        $data = [
            'task' => Task::with('user')->orderBy('created_at', 'desc')->get(),
            'date' => now()->format('Y-m-d'),
            'time' => now()->format('H.i.s'),
        ];

        return view('admin.task.excel', $data);
    }
}
