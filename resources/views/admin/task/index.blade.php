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
            <div class="card-header py-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="mb-2 mb-md-0">
                    <a href="{{ route('taskCreate') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-2"></i>
                        Add New User
                    </a>
                </div>
                <div class="d-flex">
                    <a href="{{ route('taskExcel') }}" class="btn btn-success btn-sm mr-2">
                        <i class="fas fa-file-excel mr-2"></i>
                        Export Excel
                    </a>
                    <a href="{{ route('taskPdf') }}" class="btn btn-danger btn-sm" target="_blank">
                        <i class="fas fa-file-pdf mr-2"></i>
                        Export PDF
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" width="5%">#</th>
                                <th>Name</th>
                                <th class="text-center">Task</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th class="text-center" width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $item->user->name }}</td>
                                    <td class="text-center align-middle">
                                        @if ($item->task)
                                            <span class="badge badge-primary">{{ $item->task }}</span>
                                        @else
                                            <span class="badge badge-secondary">No Task</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $item->start_date ? \Carbon\Carbon::parse($item->start_date)->format('d M Y') : '-' }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $item->end_date ? \Carbon\Carbon::parse($item->end_date)->format('d M Y') : '-' }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#ModalTaskShow{{ $item->id }}" title="Delete">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('taskEdit', $item->id) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#ModalTaskDestroy{{ $item->id }}" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                @include('admin.task.modal', ['item' => $item])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
