@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-tasks mr-2 text-primary"></i>
                {{ $title }}
            </h1>
        </div>

        <!-- Alert Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center bg-primary text-white">
                <h6 class="m-0 font-weight-bold">
                    <i class="fas fa-info-circle mr-2"></i>
                    Task Details
                </h6>
                <div class="d-flex">
                    @if (auth()->user()->is_tasks == true)
                        <a href="{{ route('taskPdf') }}" class="btn btn-light btn-sm" target="_blank">
                            <i class="fas fa-file-pdf mr-2 text-danger"></i>
                            Export PDF
                        </a>
                    @endif
                </div>
            </div>

            <div class="card-body">
                @if (auth()->user()->is_tasks == true)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th width="30%" class="bg-light">Name</th>
                                    <td>{{ $task->user->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Email</th>
                                    <td>
                                        <span class="badge badge-primary">
                                            <i class="fas fa-envelope mr-1"></i>
                                            {{ $task->user->email }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Task Title</th>
                                    <td class="font-weight-bold text-primary">{{ $task->task }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light">Start Date</th>
                                    <td>
                                        <span class="badge badge-info">
                                            <i class="far fa-calendar-alt mr-1"></i>
                                            {{ $task->start_date }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light">End Date</th>
                                    <td>
                                        <span class="badge badge-warning">
                                            <i class="far fa-calendar-alt mr-1"></i>
                                            {{ $task->end_date }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="alert alert-info w-75 mx-auto">
                            <i class="fas fa-info-circle fa-2x mb-3"></i>
                            <h4 class="alert-heading">No Task Assigned Yet</h4>
                            <p>You don't have any tasks assigned at the moment.</p>
                            <hr>
                            <p class="mb-0">Please contact your administrator if you believe this is an error.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
