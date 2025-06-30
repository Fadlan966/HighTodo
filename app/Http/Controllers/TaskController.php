<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Exports\TaskExport;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'Admin') {
            $data = array(
                "title" => "Data Task",
                "menuAdminTask" => "active",
                "task" => Task::with('user')->get(),
            );
            return view('admin.task.index', $data);
        } else {
            $data = array(
                "title" => "Data Task",
                "menuEmployeeTask" => "active",
                "task" => Task::with('user')->where('user_id', $user->id)->first(),
            );
            return view('employee.task.index', $data);
        }
    }

    public function create()
    {
        $data = array(
            "title" => "Add Task",
            "menuAdminTask" => "active",
            "user" => User::where('role', 'Employee')->where('is_tasks', false)->get(),
        );
        return view('admin/task/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'task' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            "user_id.required"       => "Name is required",
            "task.required"          => "Task is required",
            "start_date.required"    => "Start Date is required",
            "end_date.required"      => "End Date is required",
        ]);

        $user = User::find($request->user_id);
        $task = new Task;
        $task->user_id = $request->user_id;
        $task->task = $request->task;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->save();
        $user->is_tasks = true;
        $user->save();

        return redirect()->route('task')->with('success', 'Task created successfully');
    }

    public function edit($id)
    {
        $data = array(
            "title" => "Edit Task",
            "menuAdminTask" => "active",
            "task" => Task::with('user')->findOrFail($id),
        );
        return view('admin/task/update', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            "task.required" => "Task is required",
            "start_date.required" => "Start Date is required",
            "end_date.required" => "End Date is required",
        ]);

        $task = Task::findOrFail($id);
        $task->task = $request->task;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->save();

        return redirect()->route('task')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        $user = User::where('id', $task->user_id)->first();
        $user->is_tasks = false;
        $user->save();

        return redirect()->route('task')->with('success', 'Task deleted successfully');
    }

    public function excel()
    {
        $filename = now()->format('Y-m-d_H.i.s');
        return Excel::download(new TaskExport, 'TaskData_' . $filename . '.xlsx');
    }

    public function pdf()
    {
        $user = Auth::user();
        $filename = now()->format('Y-m-d_H.i.s');

        if ($user->role == 'Admin') {
            $data = array(
                'task' => Task::get(),
                'date' => now()->format('Y-m-d '),
                'time' => now()->format('H.i.s'),
            );

            $pdf = Pdf::loadView('admin/task/pdf', $data);
            return $pdf->setPaper('a4', 'landscape')->stream('TaskData_' . $filename . '.pdf');
        } else {
            $data = array(
                'date' => now()->format('Y-m-d '),
                'time' => now()->format('H.i.s'),
                'task' => Task::with('user')->where('user_id', $user->id)->first(),
            );

            $pdf = Pdf::loadView('employee/task/pdf', $data);
            return $pdf->setPaper('a4', 'potrait')->stream('TaskData_' . $filename . '.pdf');
        }
    }
}
