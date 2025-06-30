@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <a href="{{ route('task') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Task List
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('taskStore') }}" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="user_id" class="form-label">
                            <span class="text-danger">*</span>
                            Name :
                        </label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option selected disabled>-- Select Name --</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 mb-3">
                        <label for="task" class="form-label">
                            <span class="text-danger">*</span>
                            Task :
                        </label>
                        <textarea name="task" class="form-control @error('task') is-invalid @enderror" rows="5"></textarea>
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
                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
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
                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror">
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Save Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
