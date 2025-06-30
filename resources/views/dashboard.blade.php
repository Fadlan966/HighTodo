@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
            <i class="fas fa-tachometer-alt text-primary mr-2"></i>
            {{ $title }}
        </h1>
    </div>

    @if (auth()->user()->role == 'Admin')
        <!-- Admin Stats Cards -->
        <div class="row">
            <!-- Total Users Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 bg-gradient-primary text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                                    Total Users
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-white">
                                    {{ number_format($totalUser) }}
                                </div>
                                <div class="text-xs text-white-50 mt-2">
                                    <i class="fas fa-users mr-1"></i>
                                    Active users in system
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Admin Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 bg-gradient-dark text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                                    Total Admin
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-white">
                                    {{ number_format($totalAdmin) }}
                                </div>
                                <div class="text-xs text-white-50 mt-2">
                                    <i class="fas fa-user-shield mr-1"></i>
                                    System administrators
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Employee Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 bg-gradient-warning text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                                    Total Employee
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-white">
                                    {{ number_format($totalEmployee) }}
                                </div>
                                <div class="text-xs text-white-50 mt-2">
                                    <i class="fas fa-id-badge mr-1"></i>
                                    Active employees
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-badge fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Assigned Task Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 bg-gradient-success text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                                    Assigned Tasks
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-white">
                                    {{ number_format($totalAssignedTask) }}
                                </div>
                                <div class="text-xs text-white-50 mt-2">
                                    <i class="fas fa-tasks mr-1"></i>
                                    Currently assigned
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row for Admin -->
        <div class="row">
            <!-- Total Unassigned Task Card -->
            <div class="col-xl-3 col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 bg-gradient-danger text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-2">
                                    Unassigned Tasks
                                </div>
                                <div class="h4 mb-0 font-weight-bold text-white">
                                    {{ number_format($totalUnassignedTask) }}
                                </div>
                                <div class="text-xs text-white-50 mt-2">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    Needs attention
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-exclamation-triangle fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (auth()->user()->role == 'Employee')
        <!-- Employee Status Cards -->
        <div class="row justify-content-center">
            @if (auth()->user()->is_tasks == true)
                <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                    <div class="card border-0 shadow-lg h-100 bg-gradient-success text-white">
                        <div class="card-body text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-check fa-4x text-white mb-3"></i>
                            </div>
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-3">
                                Task Status
                            </div>
                            <div class="h3 mb-4 font-weight-bold text-white">
                                <span class="badge badge-light badge-lg px-4 py-3 text-success">
                                    <i class="fas fa-check mr-2"></i>
                                    ASSIGNED
                                </span>
                            </div>
                            <p class="text-white-50 mb-0 lead">
                                You have been assigned a task. Check your task details and deadlines.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if (auth()->user()->is_tasks == false)
                <div class="col-xl-6 col-lg-8 col-md-10 mb-4">
                    <div class="card border-0 shadow-lg h-100 bg-gradient-secondary text-white">
                        <div class="card-body text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-clock fa-4x text-white mb-3"></i>
                            </div>
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-3">
                                Task Status
                            </div>
                            <div class="h3 mb-4 font-weight-bold text-white">
                                <span class="badge badge-light badge-lg px-4 py-3 text-secondary">
                                    <i class="fas fa-clock mr-2"></i>
                                    UNASSIGNED
                                </span>
                            </div>
                            <p class="text-white-50 mb-0 lead">
                                You don't have any assigned tasks at the moment. Check back later or contact your supervisor.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
@endsection
