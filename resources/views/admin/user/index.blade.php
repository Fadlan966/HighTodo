@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
                <i class="fas fa-users text-primary mr-3"></i>
                {{ $title }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="#" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                </ol>
            </nav>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle text-success mr-2"></i>
                    <div>
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Main Card -->
        <div class="card shadow-lg border-0">
            <!-- Card Header with Actions -->
            <div class="card-header bg-gradient-primary py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-white">
                            <i class="fas fa-table mr-2"></i>
                            User Data Table
                        </h6>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right">
                            <div class="btn-group" role="group">
                                <a href="{{ route('userCreate') }}" class="btn btn-light btn-sm shadow-sm">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add New User
                                </a>
                                <a href="{{ route('userExcel') }}" class="btn btn-success btn-sm shadow-sm">
                                    <i class="fas fa-file-excel mr-2"></i>
                                    Export Excel
                                </a>
                                <a href="{{ route('userPdf') }}" class="btn btn-danger btn-sm shadow-sm" target="_blank">
                                    <i class="fas fa-file-pdf mr-2"></i>
                                    Export PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th class="border-0 py-3 font-weight-bold text-uppercase text-xs">#</th>
                                <th class="border-0 py-3 font-weight-bold text-uppercase text-xs">
                                    <i class="fas fa-user mr-1"></i>Name
                                </th>
                                <th class="border-0 py-3 font-weight-bold text-uppercase text-xs">
                                    <i class="fas fa-envelope mr-1"></i>Email
                                </th>
                                <th class="border-0 py-3 font-weight-bold text-uppercase text-xs">
                                    <i class="fas fa-user-tag mr-1"></i>Role
                                </th>
                                <th class="border-0 py-3 font-weight-bold text-uppercase text-xs">
                                    <i class="fas fa-tasks mr-1"></i>Task Status
                                </th>
                                <th class="border-0 py-3 font-weight-bold text-uppercase text-xs">
                                    <i class="fas fa-cogs mr-1"></i>Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr class="align-middle">
                                    <td class="text-center py-3">
                                        <span class="badge badge-light border px-3 py-2 font-weight-bold">
                                            {{ $loop->iteration }}
                                        </span>
                                    </td>
                                    <td class="text-center py-3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center mr-3">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <div>
                                                <span class="font-weight-bold text-dark">{{ $item->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center py-3">
                                        <span class="badge badge-primary px-3 py-2 rounded-pill">
                                            <i class="fas fa-envelope mr-1"></i>
                                            {{ $item->email }}
                                        </span>
                                    </td>
                                    <td class="text-center py-3">
                                        @if (strtolower($item->role) == 'admin')
                                            <span class="badge badge-dark px-3 py-2 rounded-pill">
                                                <i class="fas fa-crown mr-1"></i>{{ $item->role }}
                                            </span>
                                        @else
                                            <span class="badge badge-info px-3 py-2 rounded-pill">
                                                <i class="fas fa-user mr-1"></i>{{ $item->role }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center py-3">
                                        @if ($item->is_tasks == false)
                                            <span class="badge badge-danger px-3 py-2 rounded-pill">
                                                <i class="fas fa-times-circle mr-1"></i>Unassigned
                                            </span>
                                        @else
                                            <span class="badge badge-success px-3 py-2 rounded-pill">
                                                <i class="fas fa-check-circle mr-1"></i>Assigned
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center py-3">
                                        <div class="btn-group shadow-sm" role="group">
                                            <a href="{{ route('userEdit', $item->id) }}"
                                               class="btn btn-warning btn-sm rounded-left"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               title="Edit User">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm rounded-right"
                                                    data-toggle="modal"
                                                    data-target="#deleteModal{{ $item->id }}"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete User">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                @include('admin.user.modal', ['item' => $item])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer bg-light py-3">
                <div class="row align-items-center text-muted">
                    <div class="col-md-6">
                        <small>
                            <i class="fas fa-info-circle mr-1"></i>
                            Showing {{ count($user) }} user(s)
                        </small>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <small>
                            <i class="fas fa-clock mr-1"></i>
                            Last updated: {{ now()->format('M d, Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .avatar-sm {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .bg-gradient-primary {
            background: linear-gradient(45deg, #4e73df, #224abe);
        }

        .table tbody tr:hover {
            background-color: #f8f9fc;
            transform: translateY(-1px);
            transition: all 0.3s ease;
        }

        .btn-group .btn {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 600;
        }

        .alert {
            border-radius: 10px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: #6c757d;
        }
    </style>

    <script>
        // Initialize tooltips
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            // Add subtle animation to buttons
            $('.btn').hover(
                function() {
                    $(this).addClass('shadow');
                },
                function() {
                    $(this).removeClass('shadow');
                }
            );
        });
    </script>
@endsection
