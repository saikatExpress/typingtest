@extends('layouts.app')

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

            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="user_id">

                <!-- Language Type -->
                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Student ID</label>
                    <input type="text" name="std_id" class="form-control" value="{{ $user->std_id }}">
                    @if($errors->has('std_id'))
                        <span class="text-danger">{{ $errors->first('std_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="active" {{ ($user->status === 'active') ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ ($user->status === 'inactive') ? 'selected' : '' }}>In Active</option>
                    </select>
                    @if($errors->has('std_id'))
                        <span class="text-danger">{{ $errors->first('std_id') }}</span>
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
        <script src="{{ asset('assets/js/alert.js') }}"></script>
    @endpush
@endsection

