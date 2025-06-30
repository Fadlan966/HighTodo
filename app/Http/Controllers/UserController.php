<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
 use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            "title" => "Data User",
            "menuAdminUser" => "active",
            "user" => User::orderBy('role', 'asc')->get(),
        );
        return view('admin/user/index', $data);
    }

    public function create()
    {
        $data = array(
            "title" => "Add Data User",
            "menuAdminUser" => "active",
        );
        return view('admin/user/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "email.unique" => "Email already exists",
            "role.required" => "Role is required",
            "password.required" => "Password is required",
            "password.confirmed" => "Password confirmation does not match",
            "password.min" => "Password must be at least 8 characters",
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->is_tasks = false;
        $user->save();

        return redirect()->route('user')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $data = array(
            "title" => "Edit Data User",
            "menuAdminUser" => "active",
            "user" => User::findOrFail($id),
        );
        return view('admin/user/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ], [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "email.unique" => "Email already exists",
            "role.required" => "Role is required",
            "password.confirmed" => "Password confirmation does not match",
            "password.min" => "Password must be at least 8 characters",
        ]);

        $user = User::with('tasks')->findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->role== 'Admin') {
            $user->is_tasks = false;
            $user->tasks()->delete();
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'User deleted successfully');
    }

    public function excel()
    {
        $filename = now()->format('Y-m-d_H.i.s');
        return Excel::download(new UserExport, 'UserData_' . $filename . '.xlsx');
    }

    public function pdf()
    {
        $filename = now()->format('Y-m-d_H.i.s');
        $data = array(
            'user' => User::get(),
            'date' => now()->format('Y-m-d '),
            'time' => now()->format('H.i.s'),
        );

        $pdf = Pdf::loadView('admin/user/pdf', $data);
        return $pdf->stream('UserData_' . $filename . '.pdf');
    }
}
