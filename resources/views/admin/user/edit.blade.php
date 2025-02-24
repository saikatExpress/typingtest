@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-center text-primary mb-4">Update User</h2>

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

            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $teacher->id }}" name="user_id">

                <!-- Language Type -->
                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $teacher->email }}">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Teacher Image</label>
                    <input type="file" name="teacher_image" class="form-control dropify"
                        data-default-file="{{ $teacher->teacher_image ? asset('uploads/' . $teacher->teacher_image) : '' }}"
                        accept="image/*">
                    @error('teacher_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="active" {{ ($teacher->status === 'active') ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ ($teacher->status === 'inactive') ? 'selected' : '' }}>In Active</option>
                    </select>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                </div>



                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary btn-lg px-5 mt-4 shadow-sm">Update User</button>
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
