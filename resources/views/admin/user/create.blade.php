@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4 rounded">

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-primary mb-4">Create User</h2>
                <a href="{{ route('user.list') }}" class="btn btn-primary btn-sm">User List</a>
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

            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <!-- Language Type -->
                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Name</label>
                    <input type="text" name="name" class="form-control">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Email</label>
                    <input type="text" name="email" class="form-control">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Password</label>
                    <input type="password" name="password" class="form-control">
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Student ID</label>
                    <input type="text" name="std_id" class="form-control">
                    @if($errors->has('std_id'))
                        <span class="text-danger">{{ $errors->first('std_id') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="language_type" class="font-weight-bold text-secondary">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">In Active</option>
                    </select>
                    @if($errors->has('std_id'))
                        <span class="text-danger">{{ $errors->first('std_id') }}</span>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary btn-lg px-5 mt-4 shadow-sm">Create User</button>
                </div>
            </form>

        </div>
    </div>
@endsection
