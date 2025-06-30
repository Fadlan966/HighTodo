@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-warning text-white">
            <a href="{{ route('task') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Task List
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('taskUpdate', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="user_id" class="form-label">
                            <span class="text-danger">*</span>
                            Name :
                        </label>
                        <input type="text" value="{{ $task->user->name }}" class="form-control" disabled>
                        <input type="hidden" name="user_id" value="{{ $task->user_id }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 mb-3">
                        <label for="task" class="form-label">
                            <span class="text-danger">*</span>
                            Task :
                        </label>
                        <textarea name="task" class="form-control @error('task') is-invalid @enderror" rows="5">{{ old('task', $task->task) }}</textarea>
                        @error('task')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-6 mb-3">
                        <label for="start_date" class="form-label">
                            <span class="text-danger">*</span>
                            Start Date :
                        </label>
                        <input type="date" name="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date', $task->start_date) }}">
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="end_date" class="form-label">
                            <span class="text-danger">*</span>
                            End Date :
                        </label>
                        <input type="date" name="end_date"
                            class="form-control @error('end_date') is-invalid @enderror"
                            value="{{ old('end_date', $task->end_date) }}">
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
