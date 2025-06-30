@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-warning text-white">
            <a href="{{ route('user') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to User Data
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('userUpdate', $user->id) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-xl-6 mb-3">
                        <label for="name" class="form-label">
                            <span class="text-danger">*</span>
                            Name :
                        </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $user->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label for="email" class="form-label">
                            <span class="text-danger">*</span>
                            Email :
                        </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="role" class="form-label">
                            <span class="text-danger">*</span>
                            Role :
                        </label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                            <option disabled>-- Select Role --</option>
                            <option value="Admin" {{ $user->role== 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Employee" {{ $user->role == 'Employee' ? 'selected' : '' }}>Employee</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 mb-3">
                        <label for="password" class="form-label">
                            <span class="text-danger">*</span>
                            Password :
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label for="password_confirmation" class="form-label">
                            <span class="text-danger">*</span>
                            Password Confirmation :
                        </label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('role') is-invalid @enderror">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-edit mr-2"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
