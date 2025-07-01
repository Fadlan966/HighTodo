@extends('layouts.app')

@section('content')
    <!-- Enhanced Header with Gradient Background -->
    <div class="d-flex align-items-center justify-content-between mb-4 p-4 rounded-lg shadow-sm"
         style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
        <div class="d-flex align-items-center">
            <div class="icon-circle me-3" style="background: rgba(255,255,255,0.2); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user-plus fa-lg"></i>
            </div>
            <div>
                <h1 class="h3 mb-1 fw-bold">{{ $title }}</h1>
                <p class="mb-0 opacity-75">Create a new user account with role assignment</p>
            </div>
        </div>
        <div class="badge bg-light text-dark px-3 py-2 rounded-pill">
            <i class="fas fa-plus-circle me-1"></i>
            New User
        </div>
    </div>

    <!-- Enhanced Main Card -->
    <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
        <!-- Enhanced Card Header -->
        <div class="card-header border-0 py-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center text-white">
                    <i class="fas fa-user-cog me-3 fa-lg"></i>
                    <div>
                        <h5 class="mb-0 fw-bold">User Registration Form</h5>
                        <small class="opacity-75">Fill in the required information below</small>
                    </div>
                </div>
                <a href="{{ route('user') }}" class="btn btn-light btn-sm px-4 py-2 rounded-pill shadow-sm fw-semibold">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to User Data
                </a>
            </div>
        </div>

        <!-- Enhanced Card Body -->
        <div class="card-body p-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
            <form action="{{ route('userStore') }}" method="post" class="needs-validation" novalidate>
                @csrf

                <!-- Personal Information Section -->
                <div class="form-section mb-5">
                    <div class="section-header mb-4">
                        <div class="d-flex align-items-center">
                            <div class="section-icon me-3 d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 10px; color: white;">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold text-dark">Personal Information</h5>
                                <p class="mb-0 text-muted small">Basic user details and contact information</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-xl-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" id="name"
                                       class="form-control shadow-sm @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" placeholder="Enter full name">
                                <label for="name" class="fw-semibold">
                                    <span class="text-danger me-1">*</span>
                                    <i class="fas fa-user me-2"></i>Full Name
                                </label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-floating">
                                <input type="email" name="email" id="email"
                                       class="form-control shadow-sm @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" placeholder="Enter email address">
                                <label for="email" class="fw-semibold">
                                    <span class="text-danger me-1">*</span>
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Role Assignment Section -->
                <div class="form-section mb-5">
                    <div class="section-header mb-4">
                        <div class="d-flex align-items-center">
                            <div class="section-icon me-3 d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px; background: linear-gradient(45deg, #4facfe, #00f2fe); border-radius: 10px; color: white;">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold text-dark">Role Assignment</h5>
                                <p class="mb-0 text-muted small">Select the appropriate role for this user</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-xl-12">
                            <div class="form-floating">
                                <select name="role" id="role" class="form-select shadow-sm @error('role') is-invalid @enderror">
                                    <option selected disabled>-- Select Role --</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                    <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>
                                        Employee
                                    </option>
                                </select>
                                <label for="role" class="fw-semibold">
                                    <span class="text-danger me-1">*</span>
                                    <i class="fas fa-user-tag me-2"></i>User Role
                                </label>
                                @error('role')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Role Information Cards -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="role-info-card p-3 rounded-lg border" style="background: linear-gradient(45deg, rgba(44, 62, 80, 0.1), rgba(52, 73, 94, 0.1));">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-crown text-warning me-2"></i>
                                            <strong class="text-dark">Admin Role</strong>
                                        </div>
                                        <small class="text-muted">Full system access with management privileges</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="role-info-card p-3 rounded-lg border" style="background: linear-gradient(45deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-user text-primary me-2"></i>
                                            <strong class="text-dark">Employee Role</strong>
                                        </div>
                                        <small class="text-muted">Standard user access with limited privileges</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Section -->
                <div class="form-section mb-5">
                    <div class="section-header mb-4">
                        <div class="d-flex align-items-center">
                            <div class="section-icon me-3 d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px; background: linear-gradient(45deg, #ff416c, #ff4b2b); border-radius: 10px; color: white;">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold text-dark">Security Settings</h5>
                                <p class="mb-0 text-muted small">Set up password for the new user account</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-xl-6 mb-3">
                            <div class="form-floating">
                                <input type="password" name="password" id="password"
                                       class="form-control shadow-sm @error('password') is-invalid @enderror"
                                       placeholder="Enter password">
                                <label for="password" class="fw-semibold">
                                    <span class="text-danger me-1">*</span>
                                    <i class="fas fa-key me-2"></i>Password
                                </label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Password Requirements -->
                            <div class="password-requirements mt-2 p-3 rounded" style="background: #f8f9fa; border-left: 4px solid #17a2b8;">
                                <small class="text-muted">
                                    <strong>Password Requirements:</strong><br>
                                    <i class="fas fa-check-circle text-success me-1"></i> Minimum 8 characters<br>
                                    <i class="fas fa-check-circle text-success me-1"></i> At least one uppercase letter<br>
                                    <i class="fas fa-check-circle text-success me-1"></i> At least one number
                                </small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control shadow-sm @error('role') is-invalid @enderror"
                                       placeholder="Confirm password">
                                <label for="password_confirmation" class="fw-semibold">
                                    <span class="text-danger me-1">*</span>
                                    <i class="fas fa-shield-alt me-2"></i>Confirm Password
                                </label>
                            </div>
                            <!-- Password Match Indicator -->
                            <div class="password-match mt-2 p-3 rounded" style="background: #f8f9fa; border-left: 4px solid #6c757d;">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Passwords must match for security verification
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions pt-4 border-top">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <div class="form-note">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Fields marked with <span class="text-danger">*</span> are required
                                    </small>
                                </div>
                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm fw-semibold">
                                        <i class="fas fa-save me-2"></i>
                                        Create User Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Enhanced Styling -->
    <style>
        .form-floating > .form-control:focus,
        .form-floating > .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
        }

        .form-floating > label {
            color: #6c757d;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s ease;
            padding: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
        }

        .btn {
            transition: all 0.3s ease;
            border: none;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #5a6fd8, #6a4190);
        }

        .card {
            transition: all 0.3s ease;
        }

        .section-icon {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .role-info-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .password-requirements,
        .password-match {
            transition: all 0.3s ease;
        }

        .form-section {
            position: relative;
        }

        .icon-circle {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .invalid-feedback {
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem !important;
            }

            .btn-lg {
                width: 100%;
                margin-top: 1rem;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                align-items: stretch !important;
            }

            .button-group {
                text-align: center;
            }
        }
    </style>
@endsection
