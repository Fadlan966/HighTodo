<?php

namespace App\Exports;
use App\Invoice;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'user' => User::orderBy('role', 'asc')->get(),
            'date' => now()->format('Y-m-d '),
            'time' => now()->format('H.i.s'),
        );
        return view('admin/user/excel', $data);
    }
}
