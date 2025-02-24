@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-primary mb-4">Create Teacher</h2>
                <a href="{{ route('user.list') }}" class="btn btn-primary btn-sm">Teacher List</a>
            </div>

            @if(session('message'))
                <div class="alert alert-success" id="success-message">
                    {{ session('message') }}
                </div>
            @endif

            @if(session('failed'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('failed') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card shadow-sm p-4">

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold text-secondary">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                        @if($errors->has('name'))
                            <span class="text-danger small">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold text-secondary">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                        @if($errors->has('email'))
                            <span class="text-danger small">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold text-secondary">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password">
                        @if($errors->has('password'))
                            <span class="text-danger small">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Status Field -->
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold text-secondary">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @if($errors->has('status'))
                            <span class="text-danger small">{{ $errors->first('status') }}</span>
                        @endif
                    </div>

                    <!-- Teacher Image Field -->
                    <div class="mb-4">
                        <label for="teacher_image" class="form-label fw-bold text-secondary">Teacher Image</label>
                        <input type="file" name="teacher_image" id="teacher_image" class="form-control" accept="image/*">
                        @error('teacher_image')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">Create Teacher</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
        <script src="{{ asset('assets/js/alert.js') }}"></script>

        <script>
            $('.dropify').dropify();
        </script>
    @endpush
@endsection
