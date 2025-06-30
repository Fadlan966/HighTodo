<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = array(
            "title" => "Dashboard",
            "menuDashboard" => "active",
            "totalUser" => User::count(),
            "totalAdmin" => User::where('role', 'admin')->count(),
            "totalEmployee" => User::where('role', 'employee')->count(),
            "totalAssignedTask" => User::where('role', 'employee')->where('is_tasks', true)->count(),
            "totalUnassignedTask" => User::where('role', 'employee')->where('is_tasks', false)->count(),
        );
        return view("dashboard", $data);
    }
}
